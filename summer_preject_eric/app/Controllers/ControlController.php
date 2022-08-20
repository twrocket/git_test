<?php

namespace App\Controllers;
use App\Models\Post;
use App\Controllers\BaseController;

class ControlController extends BaseController
{
    public function index()
    {
        return view('controlsystems/index');
    }
    public function alert()
    {
        return view('controlsystems/find_string');
    }
    public function upload()
    {
        return view('controlsystems/upload.php');
    }
    
}
?>
