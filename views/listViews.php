<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class TaskView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
}