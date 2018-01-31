<?php
namespace app\admin\controller;
use think\Controller;

class Admin extends Controller

{
    public function add()
    {
        ///判断是否POST提交
        if (request()->isPost()){
            ///接收POST传过来的所有值；
            $data       =   input("post.");
            $validate   =   validate("AdminUser");
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            try{
                $id =   model("AdminUser")->add($data);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            if ($id) {
                $this->success($id."用户添加成功");
            } else {
                $this->error("用户添加失败");
            }
        } else {
            return $this->fetch();
        }

    }


}
