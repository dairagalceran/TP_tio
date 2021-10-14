<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class TaskView {

    private $smarty;
    // Creamos el constructor para Smarty
    function __construct(){
        $this->smarty = new Smarty();
    }
}