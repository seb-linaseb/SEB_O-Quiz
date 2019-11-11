<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Utils\UserSession;

class Controller extends BaseController
{
    public function __construct()
    {
        // https://lumen.laravel.com/docs/5.1/views
        view()->share('isConnected', UserSession::isConnected());
        view()->share('currentUser', UserSession::getUser());
        view()->share('isAdmin', UserSession::isAdmin());
    }
}
