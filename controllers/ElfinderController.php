<?php 

namespace fileManager\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use alexantr\elfinder\ConnectorAction;
use alexantr\elfinder\InputFileAction;
use alexantr\elfinder\TinyMCEAction;

class ElfinderController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'connector', 'tinymce', 'input', ],
                'rules' => [
                    [
                        'actions' => ['index', 'connector', 'tinymce', 'input', ],
                        'allow' => true,
                        'roles' => ['fileManager', ],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'connector' => [
                'class' => ConnectorAction::className(),
                'options' => [
                    'roots' => [
                        [
                            'alias' => 'Документы',
                            'driver' => 'LocalFileSystem',
                            'path' => Yii::getAlias('@webroot/files'),
                            'URL' => $this->module->frontendHost . Yii::getAlias('@web/files/'),
                            'mimeDetect' => 'internal',
                            'acceptedName' => '/(^([а-яА-Яa-zA-Z0-9\_\.-]*)([a-zA-Z\_0-9\.]*))$/',
                            'accessControl' => 'access',
                            'uploadOrder' => 'allow,deny',
                            'uploadAllow' => [
                                'text',
                                'application',
                                'audio',
                                'application/vnd.ms-powerpoint',
                                'application/vnd.ms-word',
                                'application/vnd.ms-excel',
                                'text/html',
                                'application/pdf',
                            ],
                            'disabled' => ['edit','rename','delete'],
                            'attributes' => [
                                [
                                    'pattern' => '/\/[.].*$/',
                                    'read' => false,
                                    'write' => false,
                                    'hidden' => true,
                                ],
                            ],
                        ],
                        [
                            'alias' => 'Изображения',
                            'driver' => 'LocalFileSystem',
                            'path' => Yii::getAlias('@webroot/images'),
                            'URL' => $this->module->frontendHost . Yii::getAlias('@web/images/'),
                            'mimeDetect' => 'internal',
                            'imgLib' => 'imagick',
                            'acceptedName' => '/(^([а-яА-Яa-zA-Z0-9\_\.-]*)([a-zA-Z\_0-9\.]*))$/',
                            'accessControl' => 'access',
                            'uploadOrder' => 'allow,deny',
                            'uploadAllow' => ['image'],
                            'disabled' => ['edit','rename','delete'],
                            'attributes' => [
                                [
                                    'pattern' => '/\/[.].*$/',
                                    'read' => false,
                                    'write' => false,
                                    'hidden' => true,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'input' => [
                'class' => InputFileAction::className(),
                'connectorRoute' => 'connector',
            ],
            'tinymce' => [
                'class' => TinyMCEAction::className(),
                'connectorRoute' => 'connector',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
