<?php


namespace backend\components\chat\widget;


use yii\web\AssetBundle;

class ChatAsset extends AssetBundle
{
    public $sourcePath = '@backend/components/chat/widget/source';

    public $js = [
        'js/chat.js'
    ];
}