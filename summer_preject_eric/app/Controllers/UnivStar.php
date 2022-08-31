<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class UnivStar extends BaseController
{
    public function index()
    {   include('..\app\Controllers\ControlController.php');
        $simple = new ControlController(); //這一行建立物件
        $simple->check(); //乎叫物件裡的displayVar()函式
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->findAll()
        ];

        return view('univStar/index', $data);
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
        if($user["status_time"]=='已下架'||$user["status"]=='草稿')
        {         
        header("Location:http://localhost:8080/");//
        echo "<script> alert('fail') </script>"; 
        exit;
        }
        return view('univStar/show', $data2);
    }

    public function announce_1()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "簡章訊息事項")->findAll()
        ];

        return view('univStar/announce_1', $data);
    }

    public function announce_2()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "招生事務")->findAll()
        ];

        return view('univStar/announce_2', $data);
    }

    public function announce_3()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "徵選資訊")->findAll()
        ];

        return view('univStar/announce_3', $data);
    }

    public function announce_4()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "會議簡報")->findAll()
        ];

        return view('univStar/announce_4', $data);
    }

    public function announce_5()
    {
        $model = new Post();

        $data = [
            'posts' => $model->where('website', "大學繁星")->where('status_time', "上架中")
                        ->where('status', "發布")->where('category', "其他事項")->findAll()
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