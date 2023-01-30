<?php 

namespace Src\Models;

use Src\Exceptions\ValidationException;
use Src\Models\Model;

class User extends Model
{
    protected static $tableName = "usuarios";
    protected static $primaryKey = "id";
    protected static $columns = [
        "nome",
        "email",
        "senha",
        "token"
    ];
    protected static $requires = [
        "nome",
        "email",
        "senha",
        "token"
    ];

    private function validate() 
    {
        $errors = [];

        if(!$this->nome) {
            $errors["nome"] = "O Nome é obrigatório!";
        }

        if(!$this->email) {
            $errors["email"] = "O E-mail é obrigatório!";
        }

        if(!$this->senha) {
            $errors["senha"] = "A Senha é obrigatória!";
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
}