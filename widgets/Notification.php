<?php
namespace app\widgets;

use app\models\Album;
use lo\widgets\modal\ModalAjax;
use Yii;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

class Notification extends \yii\bootstrap\Widget
{

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        /** @var \app\models\Notification $notification */
        foreach (\app\models\Notification::find()->all() as $notification) {
            if ($notification->itIsTime()){
                echo $notification->content;
            }
        }
    }
}
