<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/12/28
 * Time: 上午8:31
 */

namespace App\Http\Controllers\Test;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Exceptions\Handler;

class TestController extends Controller
{

    function index(){

        //
    if (Auth::check()) {
        // The user is logged in...
        echo "已登录";
    }else{
        echo "未登录";
    }

    }

    public static function Test_index($passwd,$email){
        $ldaphost = "10.188.7.10";  // your ldap servers
        $ldapport = 389;
        $ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to AD server.");        //连接ad服务
        $set = ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);    //设置参数，这个需要深入了解一下。


        try {
            $bd = ldap_bind($ldapconn, $email, $passwd); //验证用户名和密码。
        } catch (\Exception $e) {
//            report($e);
//            var_dump($e);
            echo "密码或邮箱错误";
            echo "
<!doctype html>
<head>
<meta charset=utf-8\" />
<title>js定时跳转页面的方法</title>
</head>
<body>
<script>
　　var t=10;//设定跳转的时间
　　setInterval(\"refer()\",1000); //启动1秒定时
　　function refer(){
　　　　if(t==0){
　　　　　　location=\"/login\"; //#设定跳转的链接地址
　　　　}
　　　　document.getElementById('show').innerHTML=\"\"+t+\"秒后跳转到登录\"; // 显示倒计时
　　　　t--; // 计数器递减
　　}
</script>
<span id=\"show\"></span>
</body>
</html>

            ";
            echo "<a href='/login'>返回登录</a>";
            exit;
            ldap_close($ldapconn);//关闭

            return false;
        }

        ldap_close($ldapconn);//关闭

        if ($bd){
            return true;
        }else{
            return false;
        }
    }
}

