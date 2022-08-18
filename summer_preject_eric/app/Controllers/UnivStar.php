<?php

namespace App\Controllers;
use App\Models\Post;

use App\Controllers\BaseController;
session_start();

class UnivStar extends BaseController
{
    public function index()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/index', $data);
    }

    public function announce_1()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_1', $data);
    }

    public function announce_2()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_2', $data);
    }

    public function announce_3()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_3', $data);
    }

    public function announce_4()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_4', $data);
    }

    public function announce_5()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_5', $data);
    }

    public function regulation()
    {
        return view('univStar/regulation');
    }

    public function schedule()
    {
        return view('univStar/schedule');
    }

    public function purchase_1()
    {
        return view('univStar/purchase_1');
    }

    public function purchase_2()
    {
        return view('univStar/purchase_2');
    }

    public function appform_1()
    {
        return view('univStar/appform_1');
    }

    public function appform_2()
    {
        return view('univStar/appform_2');
    }

    public function appform_3()
    {
        return view('univStar/appform_3');
    }

    public function appform_4()
    {
        return view('univStar/appform_4');
    }

    public function appform_5()
    {
        return view('univStar/appform_5');
    }

    public function appform_6()
    {
        return view('univStar/appform_6');
    }

    public function statistic()
    {
        return view('univStar/statistic');
    }

    public function download_1()
    {
        return view('univStar/download_1');
    }

    public function download_2()
    {
        return view('univStar/download_2');
    }

    public function site_1()
    {
        return view('univStar/site_1');
    }

    public function site_2()
    {
        return view('univStar/site_2');
    }

    public function site_3()
    {
        return view('univStar/site_3');
    }

    public function history_statistics()
    {
        return view('univStar/history_statistics');
    }

    public function system_area_highschool()
    {
        return view('univStar/system_area_highschool');
    }

    public function system_area_college()
    {
        return view('univStar/system_area_college');
    }

    public function query()
    {
        return view('univStar/query');
    }

    public function online()
    {
        return view('univStar/online');
    }

    public function freetelc()
    {
        return view('univStar/freetelc');
    }

    public function dispense()
    {
        return view('univStar/dispense');
    }

    public function abandon()
    {
        return view('univStar/abandon');
    }
}