<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Image extends Base
{
    public function upload()
    {
        $data = [
            'status' => 1,
            'message' => 'ok',
            'image_url' => 'https://t11.baidu.com/it/u=1213315612,146363740&fm=173&s=0DB1689696ADBB5B58A8438803005087&w=640&h=1439&img.JPEG'
        ];
        echo json_encode($data); exit;

        $file = Request::instance()->file('file');
        halt($file);
//        return 1;
    }


}
