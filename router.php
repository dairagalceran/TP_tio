<?php
require_once 'controllers/task.controller.php';
require_once 'controllers/auth.controller.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');

// leo accion y params
if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'listar';
}
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showLogin();
        break;
    case 'verify': 
        $authController = new AuthController();
        $authController->login();
        break;
    case 'logout': 
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'listar':
        $taskController = new TaskController();
        $taskController->showTasks();
        break;
    case 'insertar':
        $taskController = new TaskController();
        $taskController->addTask();
        break;
    case 'borrar':
        $taskController = new TaskController();
        $taskController->delTask($params[1]);
        break;
    case 'completar':
        $taskController = new TaskController();
        $taskController->completeTask($params[1]);
        break;
    default:
        echo '404 - Página no encontrada';
        break;
}