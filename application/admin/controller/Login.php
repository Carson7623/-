<?php
namespace app\admin\controller;
use app\common\lib\IAuth;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function check(){
        if (request()->isPost()) {
            $data   =   input("post.");
            /// 判断验证码是否正确；
            if (!captcha_check($data['code'])){
                $this->error('验证码错误');
            }
            /// 根据用户名查找信息；
            $user   =   Model('AdminUser')->get(['username' => $data['username']]);
            if (!$user || $user->status != 1) {
                $this->error('该用户不存在');
            }
            /// 判断密码是否一致；
            if ($user->password != IAuth::setPassword($data['password'])) {
                $this->error('密码错误');
            }



        } else {
            $this->error('请求不合法');
        }
    }

}
