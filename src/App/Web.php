<?php

namespace Src\App;

use Exception;

use League\Plates\Engine;
use ReflectionClass;
use Src\Models\User;
use Src\Models\Event;
use Src\Exceptions\AppException;
use Src\App\Controller;

class Web extends Controller
{

    public function home() 
    {
        session_start();
        $session = getUserSession();
        if(!$session) {
            addErrorMsg("Você precisa estar logado para acessar essa página!");
            $this->redirectTo("login");
            exit();
        }


        echo $this->view->render("calendar", [
            "title" => "Home | Agenda",
            "items" => $this->addLeftMenu()
        ]);
    }

    public function login($data) 
    {
        session_start();

        try {
            if(isset($data["login_email"])) {
                if(!$data["login_email"]) {
                    $this->throw("Você precisa digitar um e-mail!");
                }
                
                if(!$data["login_senha"]) {
                    $this->throw("Você precisa digitar uma senha!");
                }
                
                $dbUser = User::getOne([
                    "email" => $data["login_email"]
                ]);
                
                if(!$dbUser) {
                    $this->throw("Este e-mail não corresponde à nenhum usuário!");
                }

                if(!password_verify($data["login_senha"], $dbUser->senha)) {
                    $this->throw("A senha está incorreta!");
                }

                $this->setUserSession($dbUser); 
                
                $this->addMsg("Seja bem-vindo! {$dbUser->nome}"); 
                $this->redirectTo("inicio"); 
                exit();
            } 
        } catch(Exception $e) {
            addErrorMsg($e->getMessage());
        }
        
        echo $this->renderView("login", [

        ]);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        $this->redirectTo("login");
    }

    public function error($data) 
    {
        echo "<h1>Erro {$data["errcode"]}</h1>";
        var_dump($data);
    }
}