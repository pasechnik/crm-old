<?php

namespace Wepo\Controller;

use Wepo\Lib\WepoController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Wepo\Lib\AuthService as Auth;

class ApiController extends WepoController
{
    /**
     * @param string $name
     *
     * @return WepoMongoLiteGateway
     */
    public function table($name)
    {
        $sm = $this->getServiceLocator();
        $tm = $sm->get('ModelFramework\GatewayService');

        return $tm->getGateway($name);
    }

    public function testAction()
    {
        return new ViewModel();
    }


//    public function indexAction()
//    {
//        return new JsonModel(['a' => 1]);
//    }

    public function indexAction()
    {
        $setDefault     = $this->getRequest()->getPost('default', false);
        $subject = $this->getRequest()->getPost('subject', false);
        $action = $this->getRequest()->getPost('action', false);
//        $data    = [
//            [ 'name' => 'q1', 'lname' => 'lergerg2' ],
//            [ 'name' => 'wq2', 'lname' => 'lergeg2' ],
//            [ 'name' => 'qxcsac1', 'lname' => 'lgerger2' ],
//            [ 'name' => 'qsdppds1', 'lname' => 'lhgdhe2' ],
//            [ 'name' => 'q1sdcasdcsa', 'lname' => 'sdfl2' ],
//        ];
        /*
        foreach ( [
                      'User', 'Mail', 'Lead', 'Contact', 'Client', 'Document', 'Product', 'Pricebook',
                      'PricebookDetail', 'Activity', 'Quote', 'QuoteDetail', 'Order', 'OrderDetail', 'Invoice',
                      'Payment'
                  ] as $model )
        {
            $widget              = $this->getListing( $model, [
                'status_id' => [
                    Status::NEW_, Status::NORMAL, Status::CONVERTED, Status::DEAD
                ]
            ] );
            $widget[ 'actions' ] = [
                'view' => [
                    'route' => strtolower( $model ),
                    'id'    => 'id'
                ]
            ];
            if ( $widget[ 'paginator' ]->getTotalItemCount() )
            {
                $results[ 'widgets' ][ $model ] = $widget;
            }
        }
        */

        $data        = [ ];
        $errors      = [ ];
        $actionData  = [ ];
        if ($setDefault) {
            $data[] = [
                $setDefault['id'] => 0,
                'title' => 'Please select...',
            ];
        }
        if ($subject) {
            switch ($action) {
                case 'edit':
                    if (!(isset($subject['model']) && isset($subject['id']))) {
                        $errors['subject_error'] = 'subject configuration for action '.$action.'. subject equal to'.$subject;
                        break;
                    }
                    $model = $subject['model'];
                    $id = $subject['id'];
                    if ($model == 'Activity') {
                        $model = $this->table($model)->get($id);
//                        $actionData['model'] = $model;
                        $actionData['target_id'] = (string) $model->target_id;
                        $actionData['table_id'] = (string) $model->table_id;
                    }
                    break;
                default:
                    break;
            }
        }
        $searchQuery = $this->getParam('q', '');
        $product_id = $this->getParam('product_id', '');
        //, 'Client', 'Document', 'Product', 'Pricebook',
//        'PricebookDetail', 'Activity', 'Quote', 'QuoteDetail', 'Order', 'OrderDetail', 'Invoice',
//                      'Payment', 'Mail'
        $scopes =
        [
            'User', 'Lead', 'Patient',
        ];

        $scope = $this->getParam('scope', 'all');
        if ($scope == 'email') {
            $scopes = [ 'Email' ];
        }
        if ($scope == 'pricebookdetail') {
            $scopes = [ 'PricebookDetail' ];
        }
        if ($scope == 'lead') {
            $scopes = [ 'Lead' ];
        }
        if ($scope == 'contact' || $scope == 'patient') {
            $scopes = [ 'Patient' ];
        }
        if ($scope == 'user') {
            $scopes = [ 'User' ];
        }
        if ($scope == 'product') {
            $scopes = [ 'Product' ];
        }

        $titleConfig =
        [
            'User' => [
                'string' => '%s %s',
                'params' => [
                    'fname',
                    'lname',
                ],
            ],
            'Lead' => [
                'string' => '%s %s',
                'params' => [
                    'fname',
                    'lname',
                ],
            ],
            'Patient' => [
                'string' => '%s %s',
                'params' => [
                    'fname',
                    'lname',
                ],
            ],
//            'Email'=>[
//                'string' => '%s <%s>',
//                'params'=>[
//                    'user_name',
//                    'email',
//                ]
//            ],
            'PricebookDetail' => [
                'string' => '%s "%s" $%0.2f',
                'params' => [
                    'title',
                    'pricebook_title',
                    'list_price',
                ],
            ],
            'Product' => [
                'string' => '%s $%0.2f',
                'params' => [
                    'title',
                    'price'
                ],
            ],
//            'User'=>[
//                'Title'=>[
//                    'fname',
//                    'lname',
//                ]
//            ]
        ];

        $col = 5;
        $where = [ ];
        $product_id = null;
        if (count($scopes) == 1) {
            $col = 0;
            $where = ["-status_id" => ["5295fdf7c5b9f222acd3c74f","5295fdf7c5b9f222acd3c74d"]];
            if ($scopes[0] == "PricebookDetail" && $product_id) {
                $col = 0;
                $where = [ "product_id" => $product_id ];
            }
        }

        foreach ($scopes  as $model) {
            $permission                 = $this->getPermission('data:'.ucfirst($model));

            if ($permission == Auth::OWN) {
                $where[ 'owner_id' ] = (string) $this->user()->id();
            }
//            $errors['where'][] = $where;

            $results = $this->table($model)->find($where, [ ], $col, 0, $searchQuery);
//            $errors['res'][] = $results->toArray();
            foreach ($results as $result) {
                if (!$product_id) {
                    $_data = $result->getArrayCopy();
                } else {
                    $_data = $result->toSaveArray();
                }
                foreach ($_data as $key => $value) {
                    if (preg_match("/[a-z]*_id/", $key)) {
                        $_data[$key] = (string) $value;
                    }
                }
                $params = [];
                foreach ($titleConfig[$model]['params'] as $fieldName) {
                    $params[] = trim($result->$fieldName);
                }

//                $_data['title'] =  sprintf( $titleConfig[$model]['string'], $titleConfig[$model]['params'] );

                $_data[ 'title' ] = vsprintf($titleConfig[$model]['string'], $params);
//                $_data[ '_url' ]  = '/lead/view/' . $result->_id . '/index.html';
                $data[ ]          = $_data;
            }
        }

        return new JsonModel(array( 'res'=> $results, 'q' => $searchQuery, 'product_id' => $product_id, 'data' => $data, 'errors' => $errors, 'action_data' => $actionData ));
    }

    public function get($id)
    {
        # code...
    }

    public function create($data)
    {
        # code...
    }

    public function update($id, $data)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }
}
