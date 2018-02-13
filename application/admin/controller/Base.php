<?php
namespace app\admin\controller;
use think\Controller;

/**
 * Class Base
 * @package app\admin\controller
 */
class Base extends Controller
{
    public function _initialize(){
        //判断是否登陆；
        $is_login   =   $this->isLogin();
        if (!$is_login) {
            return $this->redirect("/admin/login");
        }
    }

    /**
     * @function 判断是否登陆；
     */
    public function isLogin(){
        $is_login   =   session(config('session.admin_user_name'), '', config('session.admin_url'));
        if ($is_login && $is_login->status) {
            return true;
        } else {
            return false;
        }
    }
}
