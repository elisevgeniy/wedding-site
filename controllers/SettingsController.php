<?php

namespace app\controllers;

use app\models\Settings;
use Yii;
use yii\filters\AccessControl;

class SettingsController extends \yii\web\Controller
{
    public $layout = 'album';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = $this->findModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    private function findModel(){
        return Settings::get();
    }
}
