<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/12/20
 * Time: 上午8:59
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //为数据库建表
    protected $table = 'my_flights';
    //设置主键
//    protected $primaryKey='id';

//    //不用自带的timestamps字段 自己设置created_at和updated_at
//    public $timestamps = false;
//    //日期的存储格式
//    protected $dateFormat ='U';
//    //自定义存储时间戳
//    public const CREATED_AT = 'creation_date';
//    public const UPDATED_AT = 'last_update';
//    //数据库连接
//    protected $connection = 'connection-name';


}