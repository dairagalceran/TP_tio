<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class AuthView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showFormLogin(){

        $this->smarty->display('../templates/formLogin.tpl');

    }
}