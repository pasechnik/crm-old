<?php

namespace Wepo\Lib;

class CTime
{
    private $_aTimes = array();
    private $_tstart = 0;
    private $_tprev = 0;
    private $_tpassed = 0;
    private $_tend = 0;

    private $_comStart = '';
    private $_comEnd = ': ';
    private $_incTxt = ' +';

    public function __bCTime()
    {
        $this->__construct();
    }

    public function __construct()
    {
        $mtime = microtime();
        $mtime = explode(" ", $mtime);
        $mtime = $mtime[1] + $mtime[0];
        $this->_tprev = 0;
        $this->_tstart = $mtime;
        $this->_aTimes[  ] =  $this->_comStart.'start'.$this->_comEnd.$this->_incTxt.'0s';
    }

    public function setTick($comment)
    {
        $this->_tprev = $this->_tpassed;

        $mtime = microtime();
        $mtime = explode(" ", $mtime);
        $mtime = $mtime[1] + $mtime[0];
        $this->_tend = $mtime;
        $this->_tpassed = ($this->_tend - $this->_tstart);

        $this->_aTimes[  ] =  $this->_comStart.$comment.$this->_comEnd.$this->_incTxt.sprintf("%0.5f", $this->_tpassed - $this->_tprev).'s'.' / '.sprintf("%0.5f", $this->_tpassed).'s';

        return  $this->_tpassed;
    }

    public function getStart()
    {
        return $this->_tstart;
    }

    public function getEnd()
    {
        return $this->_tend;
    }

    public function getPrevious()
    {
        return $this->_tprev;
    }

    public function getPassed()
    {
        return sprintf("%0.5f", $this->_tpassed).'s';
    }

    public function getPeriods()
    {
        return $this->_aTimes;
    }
}
