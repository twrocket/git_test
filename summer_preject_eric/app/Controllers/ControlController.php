<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ControlController extends BaseController
{
    public function index()
    {
        return view('controlsystems/index');
    }
    public function alert()
    {
        return view('controlsystems/index2');
    }
    
}
?>
