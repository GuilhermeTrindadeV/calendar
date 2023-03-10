<?php

namespace Src\Exceptions;

use Src\Exceptions\AppException;

class ValidationException extends AppException
{
    private $errors = [];

    public function __construct(array $errors = [],
    $message = "Erros de validação! Verifique os dados!",
    $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function get($att): string
    {
        return $this->errors[$att];
    }
}