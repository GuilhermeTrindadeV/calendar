<?php

namespace Src\App;

use Exception;
use ReflectionClass;
use League\Plates\Engine;

class Controller 
{
    protected $view;
    protected $router;

    public function __construct($router) 
    {
        $this->view = new Engine(__DIR__ . "/../Views", "php");
    }

    protected function addMsg(string $message = '', string $type = 'success'): void
    {
        if($type == 'success') {
            addSuccessMsg($message);
        } elseif($type == 'error') {
            addErrorMsg($message);
        }
    }

    protected function getRoute(string $key, array $params = []): ?string
    {
        return $this->router->route($key, $params);
    }
    protected function redirectTo(string $url): void 
    {
        if($url) {
            header('Location: ' . url($url));
        }
        exit();
    }

    protected function renderView(string $viewPath, array $data = []): void
    {
        echo $this->view->render($viewPath, $data);
    }

    protected function getFormErrors(Exception $e): ?array
    {
        $reflect = new ReflectionClass($e);
        if($reflect->getShortName() == "ValidationException") {
            return $e->getErrors();
        }
        return null;
    }

    protected function throw(string $message = 'Ocorreu um erro no sistema!'): void
    {
        throw new Exception($message);
    }

    protected function addLeftMenu(): array 
    {
        return [
            ["url" => url("inicio"), "name" => "Página Principal"]
        ];
    }

    protected function setUserSession($user): void 
    {
        session_start();
        $_SESSION[SESS_NAME] = $user;
    }

    protected function getUserSession()
    {
        session_start();
        return $_SESSION[SESS_NAME];
    }

    public function ajaxResponse(string $param, array $values): string
    {
        return json_encode([$param => $values]);
    }
}