<?php
namespace app\widgets;

use app\models\Service;

class ServiceWidget extends \yii\bootstrap\Widget
{

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        echo '<div class="row" style="display: flex; flex-flow: row wrap;">';
//        echo '<div class="col-md-12 col-md-offset-0">';

        /** @var Service $item */
        foreach (Service::find()->orderBy('sortOrder')->all() as $index => $item) {

            echo '<div class="col-md-6" style="margin-bottom: 20px;">';
                echo '<div class="feature-left animate-box" data-animate-effect="fadeInLeft">';
                    echo '<span class="icon">';
                        echo "<i class='icon-{$item->icon}'></i>";
                    echo '</span>';
                    echo '<div class="feature-copy">';
                        echo "<h3>{$item->title}</h3>";
                        echo "<p>{$item->text}</p>";
                        echo "<p><u>Контакты:</u></p>";
                        echo "<p>{$item->contact}</p>";
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    }
}
