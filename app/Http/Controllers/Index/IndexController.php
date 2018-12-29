<?php

namespace App\Http\Controllers\Index;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Flight;

class IndexController extends Controller
{
    //获取查询数据
    function getEntry(Request $request){
        header("Content-type:text/html;charset=utf-8");
        //判断是否存在的数据库缓存
        if(!Cache::has('sqlData')){
            //若不存在
            //查询出数据库数据
            $getData = DB::select('select country_en,country_cn from _select_caches');
            //将数据写入缓存
            Cache::forever('sqlData',$getData);
            }
            //获取用户输入
        $getEntry=$request['select'];
        //返回对 缓存数据模糊查询出的结果
        $res=$this->search(Cache::get('sqlData'),$getEntry);
        return $res;
    }

    function index(){


        $flights = App\Flight::all();

        foreach ($flights as $flight) {
            echo $flight->name;
        }
//        $users = DB::select('select country_en,country_cn from _select_caches');
//        var_dump($users);
        return ;
    }

    //清理缓存
    function clearCache(){
        //清理缓存
        Cache::forget('sqlData');
        //返回结果给视图
       return view('index.index',['mess'=>"清理成功!"]);
    }


    //在缓存中进行模糊查询  的方法
    function search($a,$keywords) {//区分大小写
        $keywords=ucwords($keywords);//首字母大写
        $arr=$result=array();
        foreach ($a as $key => $value) {
            foreach ($value as $valu) {
                if(strstr($valu, $keywords) !== false){
                    array_push($arr, $key);
                }
            }
        }
        foreach ($arr as $key => $value) {
            if(array_key_exists($value,$a)){
                array_push($result, $a[$value]);
            }
        }
        return $result;
    }





}
