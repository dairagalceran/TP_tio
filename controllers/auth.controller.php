<?php
require_once 'models/user.model.php';
require_once 'views/auth.view.php';
require_once 'helpers/auth.helper.php';

class AuthController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin() {
        $this->view->showFormLogin();
    }

    /**
     * Verifica si los datos del user son correctos
     */
    public function login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
     
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);
     
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {
                 // armo la sesion del usuario
                $this->authHelper->login($user);
                header("Location: " . BASE_URL);
            } else {
                $this->view->showFormLogin("Usuario o contraseña inválida");
            }
        }
    }

    public function logout() {
        $this->authHelper->logout();
    }
}