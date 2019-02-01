<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Utils\UserSession;

class Controller extends BaseController
{
    public function __construct() {
    view()->share('isConnected', UserSession::isConnected());
    view()->share('currentUser', UserSession::getUser());
    view()->share('isAdmin', UserSession::isAdmin());
    }

    public function isUserAuthorized() {
        if(!UserSession::isAdmin) {
            header('Location: ' . route('home'));
        }
    }
}
