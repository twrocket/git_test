<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class UnivApply extends BaseController
{   
    public function index()
    {   include('..\app\Controllers\ControlController.php');
        $simple = new ControlController(); //這一行建立物件
        $simple->check(); //乎叫物件裡的displayVar()函式
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學個申")->where('status_time', "上架中")
                        ->where('status', "發布")->findAll()
        ];

        return view('univApply/index', $data);
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
        $user = $model->find($post_id);
        if($user["status_time"]=='已下架'||$user["status"]=='草稿')
        {         
        header("Location:http://localhost:8080/");//
        echo "<script> alert('fail') </script>"; 
        exit;
        }
        return view('univApply/show', $data2);
    }

    public function announce_1()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "簡章訊息事項")->findAll()
        ];

        return view('univApply/announce_1', $data);
    }

    public function announce_2()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "招生事務")->findAll()
        ];

        return view('univApply/announce_2', $data);
    }

    public function announce_3()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "徵選資訊")->findAll()
        ];

        return view('univApply/announce_3', $data);
    }

    public function announce_4()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "會議簡報")->findAll()
        ];

        return view('univApply/announce_4', $data);
    }

    public function announce_5()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學個申")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "其他事項")->findAll()
        ];

        return view('univApply/announce_5', $data);
    }

    public function regulation()
    {
        return view('univApply/regulation');
    }

    public function schedule()
    {
        return view('univApply/schedule');
    }

    public function purchase_1()
    {
        return view('univApply/purchase_1');
    }

    public function purchase_2()
    {
        return view('univApply/purchase_2');
    }

    public function appform_1()
    {
        return view('univApply/appform_1');
    }

    public function appform_2()
    {
        return view('univApply/appform_2');
    }

    public function appform_3()
    {
        return view('univApply/appform_3');
    }

    public function appform_4()
    {
        return view('univApply/appform_4');
    }

    public function appform_5()
    {
        return view('univApply/appform_5');
    }

    public function appform_6()
    {
        return view('univApply/appform_6');
    }

    public function help_vulnerable()
    {
        return view('univApply/help_vulnerable');
    }

    public function statistic()
    {
        return view('univApply/statistic');
    }

    public function download_1()
    {
        return view('univApply/download_1');
    }

    public function download_2()
    {
        return view('univApply/download_2');
    }

    public function site_1()
    {
        return view('univApply/site_1');
    }

    public function site_2()
    {
        return view('univApply/site_2');
    }

    public function site_3()
    {
        return view('univApply/site_3');
    }

    public function history_statistics()
    {
        return view('univApply/history_statistics');
    }

    public function system_area_highschool()
    {
        return view('univApply/system_area_highschool');
    }

    public function system_area_college()
    {
        return view('univApply/system_area_college');
    }

    public function query()
    {
        return view('univApply/query');
    }

    public function online()
    {
        return view('univApply/online');
    }

    public function apply()
    {
        return view('univApply/apply');
    }

    public function freetelc()
    {
        return view('univApply/freetelc');
    }

    public function result()
    {
        return view('univApply/result');
    }

    public function dataupload()
    {
        return view('univApply/dataupload');
    }

    public function list()
    {
        return view('univApply/list');
    }

    public function rank()
    {
        return view('univApply/rank');
    }

    public function dispense()
    {
        return view('univApply/dispense');
    }

    public function abandon()
    {
        return view('univApply/abandon');
    }
}
