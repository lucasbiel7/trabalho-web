<?php

/**
 * 
 * Exceções para quando o usuário tentar autenticar
 * 
 * @author Lucas Gabriel de Souza Dutra
 * 
 */
class LoginException extends Exception
{
    public function LoginException($message)
    {
        parent::__construct($message);
    }
}
?>