<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class HighApply extends BaseController
{
    public function index()
    {   include('..\app\Controllers\ControlController.php');
        $simple = new ControlController(); //這一行建立物件
        $simple->check(); //乎叫物件裡的displayVar()函式
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中個申")->where('status_time', "上架中")
                        ->where('status', "發布")->findAll()
        ];

        return view('highApply/index', $data);
    }

    public function show($post_id)
    {
        
        $model = new Post();
        $posts = $model->findAll();         
        include('..\app\Controllers\ControlController.php');
        $simple = new ControlController(); //這一行建立物件
        $simple->check(); //乎叫物件裡的displayVar()函式
        $model2 = new Post();
        $data2 = [
            'posts' => $model2->find($post_id)
        ];
        if($posts[$post_id-1]["status_time"]=='已下架')
        {         
        header("Location:http://localhost:8080/");//
        echo "<script> alert('fail') </script>"; 
        exit;
        }
        return view('highApply/show', $data2);
    }

    public function announce_1()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "簡章訊息事項")->findAll()
        ];

        return view('highApply/announce_1', $data);
    }

    public function announce_2()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "招生事務")->findAll()
        ];

        return view('highApply/announce_2', $data);
    }

    public function announce_3()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "徵選資訊")->findAll()
        ];

        return view('highApply/announce_3', $data);
    }

    public function announce_4()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "會議簡報")->findAll()
        ];

        return view('highApply/announce_4', $data);
    }

    public function announce_5()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "高中個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "其他事項")->findAll()
        ];

        return view('highApply/announce_5', $data);
    }

    public function regulation()
    {
        return view('highApply/regulation');
    }

    public function schedule()
    {
        return view('highApply/schedule');
    }

    public function purchase_1()
    {
        return view('highApply/purchase_1');
    }

    public function purchase_2()
    {
        return view('highApply/purchase_2');
    }

    public function appform_1()
    {
        return view('highApply/appform_1');
    }

    public function appform_2()
    {
        return view('highApply/appform_2');
    }

    public function appform_3()
    {
        return view('highApply/appform_3');
    }

    public function appform_4()
    {
        return view('highApply/appform_4');
    }

    public function appform_5()
    {
        return view('highApply/appform_5');
    }

    public function appform_6()
    {
        return view('highApply/appform_6');
    }

    public function help_vulnerable()
    {
        return view('highApply/help_vulnerable');
    }

    public function statistic()
    {
        return view('highApply/statistic');
    }

    public function download_1()
    {
        return view('highApply/download_1');
    }

    public function download_2()
    {
        return view('highApply/download_2');
    }

    public function site_1()
    {
        return view('highApply/site_1');
    }

    public function site_2()
    {
        return view('highApply/site_2');
    }

    public function site_3()
    {
        return view('highApply/site_3');
    }

    public function history_statistics()
    {
        return view('highApply/history_statistics');
    }

    public function system_area_highschool()
    {
        return view('highApply/system_area_highschool');
    }

    public function system_area_college()
    {
        return view('highApply/system_area_college');
    }

    public function query()
    {
        return view('highApply/query');
    }

    public function online()
    {
        return view('highApply/online');
    }

    public function apply()
    {
        return view('highApply/apply');
    }

    public function freetelc()
    {
        return view('highApply/freetelc');
    }

    public function result()
    {
        return view('highApply/result');
    }

    public function dataupload()
    {
        return view('highApply/dataupload');
    }

    public function list()
    {
        return view('highApply/list');
    }

    public function rank()
    {
        return view('highApply/rank');
    }

    public function dispense()
    {
        return view('highApply/dispense');
    }

    public function abandon()
    {
        return view('highApply/abandon');
    }
}
