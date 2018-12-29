<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/12/20
 * Time: 下午3:16
 */

namespace App\Http\Controllers\Cache;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class CacheController extends Controller
{
    public function index(){
//        实例化一个缓存
//        $cache=new Cache();
        //设置缓存时间和目录
//        $cache=new Cache();
//        $cache->put('data_key','data_value');

        //添加缓存
//        Cache::put('key1','val1',10);

//        //用回调函数设置缓存
        Cache::remember('remember','11',function(){
                return 'uuq';
        });


        //删除缓存
//        Cache::pull('remember');
        //Cache::forget('key');

        //清空缓存
        //Cache::flush();

//        var_dump(Cache::get('remember'));

//
        if (Cache::has('sqlData')) {
            echo "yes";
        }else{
            echo "no";
        }
        $value = Cache::get('sqlData');
        var_dump($value);


//        $value = Cache::get('key');
//        dd($value);
//        var_dump($value);
//
//        $value = Cache::store('file')->get('foo');
//        Cache::store('redis')->put('bar', 'baz', 10);
//        dd($value);
//        var_dump($value);
        return ;
    }
}