<?php


namespace backend\components\chat\widget;


use yii\base\Widget;

class ChatWidget extends Widget
{
    public $directoryAsset;

    public function run()
    {
        return $this->render('index',['directoryAsset'=>$this->directoryAsset]);
    }
}