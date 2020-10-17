<?php
namespace app\widgets;

use app\models\Album;
use app\models\CoupleStory;
use lo\widgets\modal\ModalAjax;
use Yii;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

class CoupleStoryWidget extends \yii\bootstrap\Widget
{

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        echo '<div class="row">';
        echo '<div class="col-md-12 col-md-offset-0">';
        echo '<ul class="timeline animate-box">';

        /** @var CoupleStory $item */
        foreach (CoupleStory::find()->orderBy('sortOrder')->all() as $index => $item) {
            $inverted = ($index + 1) % 2 == 0;
            $class = ($inverted) ? 'timeline-inverted animate-box' : 'animate-box';

            echo "<li class='{$class}'>";
                echo "<div class='timeline-badge' style='background-image:url({$item->photo});'></div>";
                echo "<div class='timeline-panel'>";
                    echo "<div class='timeline-heading'>";
                        echo "<h3 class='timeline-title'>{$item->title}</h3>";
                        echo "<span class='date'>{$item->date}</span>";
                    echo "</div>";
                    echo "<div class='timeline-body'>";
                        echo "<p>{$item->text}</p>";
                    echo '</div>';
                echo '</div>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }
}
