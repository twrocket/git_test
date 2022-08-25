<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class HighStar extends BaseController
{
    public function index()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->findAll()
        ];

        return view('highStar/index', $data);
    }

    public function show($post_id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('highStar/show', $data);
    }

    public function announce_1()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "簡章訊息事項")->findAll()
        ];

        return view('highStar/announce_1', $data);
    }

    public function announce_2()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "招生事務")->findAll()
        ];

        return view('highStar/announce_2', $data);
    }

    public function announce_3()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "徵選資訊")->findAll()
        ];

        return view('highStar/announce_3', $data);
    }

    public function announce_4()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "會議簡報")->findAll()
        ];

        return view('highStar/announce_4', $data);
    }

    public function announce_5()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "其他事項")->findAll()
        ];

        return view('highStar/announce_5', $data);
    }

    public function regulation()
    {
        return view('highStar/regulation');
    }

    public function schedule()
    {
        return view('highStar/schedule');
    }

    public function purchase_1()
    {
        return view('highStar/purchase_1');
    }

    public function purchase_2()
    {
        return view('highStar/purchase_2');
    }

    public function appform_1()
    {
        return view('highStar/appform_1');
    }

    public function appform_2()
    {
        return view('highStar/appform_2');
    }

    public function appform_3()
    {
        return view('highStar/appform_3');
    }

    public function appform_4()
    {
        return view('highStar/appform_4');
    }

    public function appform_5()
    {
        return view('highStar/appform_5');
    }

    public function appform_6()
    {
        return view('highStar/appform_6');
    }

    public function statistic()
    {
        return view('highStar/statistic');
    }

    public function download_1()
    {
        return view('highStar/download_1');
    }

    public function download_2()
    {
        return view('highStar/download_2');
    }

    public function site_1()
    {
        return view('highStar/site_1');
    }

    public function site_2()
    {
        return view('highStar/site_2');
    }

    public function site_3()
    {
        return view('highStar/site_3');
    }

    public function history_statistics()
    {
        return view('highStar/history_statistics');
    }

    public function system_area_highschool()
    {
        return view('highStar/system_area_highschool');
    }

    public function system_area_college()
    {
        return view('highStar/system_area_college');
    }

    public function query()
    {
        return view('highStar/query');
    }

    public function online()
    {
        return view('highStar/online');
    }

    public function freetelc()
    {
        return view('highStar/freetelc');
    }

    public function dispense()
    {
        return view('highStar/dispense');
    }

    public function abandon()
    {
        return view('highStar/abandon');
    }
}
