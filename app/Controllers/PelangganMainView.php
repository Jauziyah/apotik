<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganMainView extends BaseController
{
    public function index()
    {
        return view('pelanggan/main');
    }
}
