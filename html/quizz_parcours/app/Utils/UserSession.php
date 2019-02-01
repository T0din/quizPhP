<?php

namespace App\Utils;

class UserSession {
    public function __construct()
    {
        //
    }

    public static function connect($user)
    {
        $_SESSION['currentUser'] = $user;
        return true;
    }

    public static function disconnect()
    {
        unset($_SESSION['currentUser']);
        return true;
    }

    public static function isConnected()
    {
        if(isset($_SESSION['currentUser'])){
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    // on récupère un objet avec toutes ses infos
    public static function getUser()
    {
        if(self::isConnected()){
            $result = $_SESSION['currentUser'];
        } else {
            $result = false;
        }
        return $result;
    }

    public static function getRoleId()
    {
        if(self::isConnected()){
            $result = $_SESSION['currentUser']->roles_id;
        } else {
            $result = false;
        }
        return $result;
    }

    public static function isAdmin()
    {
       return(self::getRoleId() === 1);
    }
}
















?>