<?php
//Start session include config to your config.php files if wanted
session_start();

function setSession($data)
{
    foreach ($data as $key => $value) {
        $_SESSION[$key] = $value;
    }
}
