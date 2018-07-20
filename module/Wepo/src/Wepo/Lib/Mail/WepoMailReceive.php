<?php

namespace Wepo\Lib\Mail;

use Wepo\Model\MailSetting;
use Wepo\Model\Mail;
use RecursiveIteratorIterator;
use Zend\Mail\Storage\Message;
//////

/**
 * Description of WepoMail
 *
 * @author PROG-2
 */
abstract class WepoMailReceive
{
    protected $getTransport = null;
    protected $setting      = null;

    public function __construct(MailSetting $setting)
    {
        $this->setting = $setting;
    }

    //fetch all Mails
    protected function openTransport()
    {
        try {
            $protocolName         = '\\Zend\\Mail\\Storage\\'.$this->setting->setting_protocol;
            $this->getTransport = new $protocolName($this->setting->getProtocolSetting());
        } catch (\Exception $ex) {
            //create checking exception to output normal view, that describes problem to user
            throw $ex;
//            throw new \Exception( 'wrong mail server sync connection' );
        }
    }

    protected function closeTransport()
    {
        $this->getTransport->close();
    }

    public function fetchAll($exceptProtocolUids = [ ], $type = null)
    {
        $mailArray = [ ];
        $uids      = $this->getTransport->getUniqueId();
        $uids      = array_diff($uids, $exceptProtocolUids);

        foreach ($uids as $uid) {
            $rawMail = $this->getTransport->getMessage($this->getTransport->getNumberByUniqueId($uid));

            $from    = $rawMail->from;
            $typeM = strlen(stristr($from, $this->setting->email)) ? Mail::outbox : Mail::inbox;
            if (isset($type) && !strlen(stristr($typeM, $type))) {
                continue;
            }

            list($newMail, $attachment) = $this->compileMail($uid, $typeM, $rawMail);
            $mailArray[ $newMail->header_id ] = $newMail;
        }
//        prn( $mailArray );
//        exit();
        return $mailArray;
    }

    public function get($header_id)
    {
        $mails = $this->fetchAll();
        foreach ($mails as $mail) {
            if ($mail->header_id == $header_id) {
                return $mail;
            }
        }

        return;
    }

    //return null if protocol doesn't support work with folders, in other way it returns \RecursiveIteratorIterator
    abstract protected function fetchFolders();

//    //case no folder work support in protocol realization
//    public function updateFolders(RecursiveIteratorIterator $directoryStructure)
//    {
//        return true;
//    }
    //create unique id for mails. Uid cross over the protocol.
    //parsing email and fetches only text/plain part.
    //In case no text/plain part found fetches text/html
    protected function parseMail($rawMail)
    {
        //        if ( $rawMail -> isMultipart() )
//        {
//            $boundary = $rawMail -> getHeaderField( 'content-type', 'boundary' );
//            $mimeMessage = \Zend\Mime\Message::createFromMessage( $rawMail -> getContent(), $boundary );
//            foreach ( $mimeMessage->  getParts() as $part )
//            {
//                prn($part->getContent());
//            }
////            prn($mimeMessage->  getParts());
//            exit();
//        }
//        else
//        {
//            $boundary = '';
//        }

        $result = [ ];
        if ($rawMail->isMultipart()) {
            try {
                foreach ($rawMail as $part) {
                    if ($part->isMultipart()) {
                        return array_merge($result, $this->parseMail($part));
                    } else {
                        $result[ strtolower($part->getHeaderField('Content-Type')) ][] = $part;
                    }
                }
            } catch (\Zend\Mail\Header\Exception\InvalidArgumentException $exc) {
            }
        } else {
            $result[ isset($rawMail->content_type) ? $rawMail->getHeaderField('Content-Type') : 'no_content_type' ][] = $rawMail;
        }

        return $result;
    }

    protected function compileMail($uid, $type, $rawMail)
    {
        $newMail   = new Mail();
        $headeruid = $this->setMailUid($rawMail);

        $stack = $this->parseMail($rawMail);

        $mailConfig = $this->getMailConfig($stack, $rawMail);
        $attachment = $this->getAttachment($stack);

        $mailConfig[ 'protocol_ids' ] = $this->getSettingUid($uid);
        $mailConfig[ 'header_id' ]    = $headeruid;
        $mailConfig[ 'type' ]         = $type;
        $mailConfig[ 'size' ]         = strlen($mailConfig[ 'text' ]);

        $mail = new Mail($mailConfig);

        return [ $mail, null ];
    }

    public function getMailConfig($stack, $rawMail)
    {
        $globalHeaders = $rawMail->getHeaders();
//        prn( $globalHeaders );

        if (array_key_exists('text/plain', $stack)) {
            $mails                        = $stack[ 'text/plain' ];
            $mailConfig[ 'content_type' ] = 'text/plain; ';
        } elseif (array_key_exists('text/html', $stack)) {
            $mails                        = $stack[ 'text/html' ];
            $mailConfig[ 'content_type' ] = 'text/html; ';
        } elseif (array_key_exists('no_content_type', $stack)) {
            $mails                        = $stack[ 'no_content_type' ];
            $mailConfig[ 'content_type' ] = 'no_content_type; ';
        } else {
            $mails                        = [ $rawMail ];
            $mailConfig[ 'content_type' ] = '';
        }

        $mailConfig[ 'text' ] = '';
        foreach ($globalHeaders as $header) {
            $key = strtolower($header->getFieldName());
            switch ($key) {
                case 'from':
                    $mailConfig[ 'from' ]      = $header->getFieldValue();
                    break;
                case 'to':
                    $mailConfig[ 'to' ]        = $header->getFieldValue();
                    break;
                case 'in-reply-to':
                    $mailConfig[ 'inReplyTo' ] = $header->getFieldValue();
                    break;
                case 'subject':
                    $mailConfig[ 'title' ]     = $header->getFieldValue();
                    break;
                case 'date':
                    $mailConfig[ 'date' ]      = date('Y-m-d H:i:s', strtotime($header->getFieldValue()));
                    break;
                default:
                    break;
            }
        }
//        prn( $mailConfig );

        $mailText = '';

        foreach ($mails as $mail) {
            //            prn( $mail );
            $headers = $mail->getHeaders();

            $partText = $mail->getContent();

            try {
                $partText = $this->decode($partText, $mail->contentTransferEncoding);
            } catch (\Exception $ex) {
            }

            try {
                $currentCharset = mb_internal_encoding();
                $mailCharset    = $mail->getHeaderField('content-type', 'charset');
                $partText       = mb_convert_encoding($partText, $currentCharset, $mailCharset);
            } catch (\Exception $ex) {
                $partText = mb_convert_encoding($partText, $currentCharset);
            }

            $mailConfig[ 'content_type' ] = $mailConfig[ 'content_type' ].'charset = '.$currentCharset;
            $mailText                     = $mailText.'
                        '.$partText;

//            foreach ( $headers as $header )
//            {
//                switch ( $key )
//                {
//                    case 'content-type':
//                    default:
//                        break;
//                }
//            }
        }

        $mailConfig[ 'text' ] = $mailText;

        return $mailConfig;
    }

    public function getAttachment($stack)
    {
        return;
    }

    protected function getSettingUid($uid)
    {
        return [ $this->setting->id() => $uid ];
    }

    protected function setMailUid(Message $rawMail)
    {
        $headers = $rawMail->getHeaders()->toArray();
        if (isset($headers[ 'Message-ID' ])) {
            $uid = $headers[ 'Message-ID' ];
        } else {
            $uid = md5($rawMail->getHeaders()->toString().$rawMail->getContent());

            if (isset($_SERVER[ "SERVER_NAME" ])) {
                $hostName = $_SERVER[ "SERVER_NAME" ];
            } else {
                $hostName = php_uname('n');
            }

            $uid = '<'.$uid.'@'.$hostName.'>';
        }

        return $uid;
    }

    protected function decode($content, $transferEncoding)
    {
        $transferEncoding = strtolower($transferEncoding);

        switch ($transferEncoding) {
            case 'base64':
                return base64_decode($content);
                break;
            case 'quoted-printable':
                return quoted_printable_decode($content);
                break;
            default:
                //in case 7bit, 8bit or binary
                return $content;
                break;
        }
    }
}
