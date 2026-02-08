<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Controllers\LoginController as LoginController;

class LoginAdd extends LoginController
{
    public function loginView()
    {
        return parent::loginView();
    }
    public function loginAction(): RedirectResponse
    {
        $response = parent::loginAction();



        if (auth()->loggedIn()) {
            $user = auth()->user();
            if ($user->inGroup('pelanggan')) {
                return redirect()->route('pelanggan.main_view');
            } elseif($user->inGroup('admin')){
                return redirect()->route('admin.main_view');
            } elseif($user->inGroup('owner')){
                return redirect()->route('owner.main_view');
            }
        }

        return $response;
    }
}
