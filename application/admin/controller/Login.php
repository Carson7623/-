<?php
namespace app\admin\controller;
use app\common\lib\IAuth;
use think\Controller;

class Login extends Base
{
    public function _initialize()
    {
    }

    public function index()
    {
        $is_login   =   $this->isLogin();
        if ($is_login) {
            return $this->redirect("/admin/index");
        }
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
            try{
                $user   =   Model('AdminUser')->get(['username' => $data['username']]);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            if (!$user || $user->status != config('status.user_status')) {
                $this->error('该用户不存在');
            }
            /// 判断密码是否一致；
            if ($user->password != IAuth::setPassword($data['password'])) {
                $this->error('密码错误');
            }
            /// 最后登陆时间和IP进行修改；
            $insert_data['last_login_time']    =   time();
            $insert_data['last_login_ip']      =   request()->ip();
            try {
                Model('AdminUser')->save($insert_data, ['id' => $user->id]);
            } catch(\Exception $e) {
                echo $e->getMessage();
            }
            ///存入SESSION
            session(config('session.admin_user_name'), $user, config('session.admin_url'));
            $this->success('登陆成功', '/admin/index');
        } else {
            $this->error('请求不合法');
        }
    }

    /**
     * @function    退出
     */
    public function logout() {
        session(null, config('session.admin_url'));
        $this->redirect('login/index');
    }
}
