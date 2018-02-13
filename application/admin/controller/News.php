<?php
namespace app\admin\controller;
use think\Controller;

class News extends Base
{
    /**
     * 添加页面
     * @return mixed
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * 列表页面
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }


}
