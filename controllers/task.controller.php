<?php

require_once 'models/task.model.php';
require_once 'views/task.view.php';
require_once 'helpers/auth.helper.php';

class TaskController {
    private $model;
    private $view;

    private $authHelper;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
        $this->authHelper = new AuthHelper();

         // barrera que este loguead
         $this->authHelper->checkLoggedIn();
    }

    public function showTasks() {
        $tareas = $this->model->getAllTasks();
        $this->view->showTasks($tareas);
    }

    function addTask() {
        $titulo = $_REQUEST['titulo'];
        $prioridad = $_REQUEST['prioridad'];
        $descripcion = $_REQUEST['descripcion'];
    
        $this->model->insertTask($titulo, $descripcion, $prioridad);
        
        header("Location: " . BASE_URL); 
    }

    function delTask($id) {
        $this->model->deleteTask($id);
        header("Location: " . BASE_URL);
    }

    function completeTask($id){
        $this->model->updateTask($id);
        header("Location: " . BASE_URL);
    }

}
