<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class TaskView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showTasks($tasks) {     
        $this->smarty->assign('titulo','Lista de tareas');
        $this->smarty->assign('tituloform', 'Ingresar una tarea');
        $this->smarty->assign('tasks', $tasks );

        $this->smarty->display('../templates/taskList.tpl');
   
    }   

    function showTaskEditForm(){
        
    }
}