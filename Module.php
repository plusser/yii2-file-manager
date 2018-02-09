<?php 

namespace fileManager;

use Yii;

class Module extends \yii\base\Module
{

    public $patternPrefix = 'file-manager';
    public $frontendHost = NULL;

    public static $instance;

    public function init()
    {
        parent::init();

        if(($app = Yii::$app) instanceof \yii\web\Application){
            $app->urlManager->addRules([
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix, 'route' => $this->id . '/elfinder/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix . '/connector', 'route' => $this->id . '/elfinder/connector'],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix . '/tinymce', 'route' => $this->id . '/elfinder/tinymce'],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix . '/input', 'route' => $this->id . '/elfinder/input'],
            ], FALSE);
        }

        static::$instance = $this;
    }

}
