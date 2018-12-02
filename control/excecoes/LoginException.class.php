<?php
class LoginException extends Exception
{
    public function LoginException($message)
    {
        parent::__construct($message);
    }
}
?>