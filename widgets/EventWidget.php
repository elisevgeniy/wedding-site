<?php
namespace app\widgets;

use app\models\Event;
use yii\bootstrap\Modal;
use yii\helpers\Html;

class EventWidget extends \yii\bootstrap\Widget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $modal = Modal::widget([
            'id' => 'map_event',
//            'class' => 'container',
            'header' => 'Карта',
        ]);

        $this->getView()->registerJsVar('modal', $modal);

        $JS = <<< JS
$('body').append(modal);

function yandexMapLoad(code, name) {
console.log(this);
console.log(code);
    let map_iframe = '<iframe src=\"https://yandex.ru/map-widget/v1/-/'+ code  +'\"width=\"100%\" height=\"400\" frameborder=\"0\" allowfullscreen=\"true\"></iframe>';

    $($('#map_event>div>div>div.modal-header')).html(name);
    $($('#map_event>div>div>div.modal-body')).html(map_iframe);
}

JS;
        $this->getView()->registerJs($JS, \yii\web\View::POS_END);

        echo '<div class="target" style="display: flex; flex-flow: row wrap;">';

        /** @var Event $item */
        foreach (Event::find()->orderBy('sortOrder')->all() as $index => $item) {

            $preStartSpace = (empty($item->preStart)) ? '' : ' ';
            $preEndSpace = (empty($item->preEnd)) ? '' : ' ';

            $modal_title = Html::encode($item->title . ' | ' . $item->address);

            echo '<div class="col-md-4 col-sm-4 text-center">';
                echo '<div class="event-wrap animate-box">';
                    echo "<h3>{$item->title}</h3>";
                    echo "<div class='event-col'>";
                        echo '<i class="icon-clock"></i>';
                        echo "<span>{$item->preStart}{$preStartSpace}{$item->startTime}</span>";
                        echo "<span>{$item->preEnd}{$preEndSpace}{$item->endTime}</span>";
                    echo '</div>';
                    echo "<div class=\"event-col\" data-target=\"#map_event\" data-toggle=\"modal\" onclick=\"yandexMapLoad('{$item->map}', '{$modal_title}')\">";
                        echo '<i class="icon-address"></i>';
                        echo "<span style='color: #85cee4;'>{$item->address} (карта)</span>";
                    echo '</div>';
                    echo "<p>{$item->text}</p>";
                echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    }
}
