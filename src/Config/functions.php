<?php

function url($uri = null)
{
    if($uri) {
        if(strpos($uri, 'http://') !== false || strpos($uri, 'https://') !== false) {
            return $uri;
        }

        return ROOT . "/{$uri}"; 
    }

    return ROOT; 
}

function addSuccessMsg(string $msg)
{
    $_SESSION[MESSAGE_NAME] = [
        "message" => $msg,
        "type" => "success"
    ];
}

function addErrorMsg(string $msg)
{
    $_SESSION[MESSAGE_NAME] = [
        "message" => $msg,
        "type" => "danger"
    ];
}

function setUserSession($user) 
{   
    session_start();
    $_SESSION[SESS_NAME] = $user;
}

function getUserSession()
{
    session_start();
    return $_SESSION[SESS_NAME];
}