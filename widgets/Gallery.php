<?php
namespace app\widgets;

use app\models\Album;
use lo\widgets\modal\ModalAjax;
use Yii;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

class Gallery extends \yii\bootstrap\Widget
{

    /**
     * {@inheritdoc}
     */
    public function run()
    {
            echo '<div class="row row-bottom-padded-md">
                    <div class="col-md-12">
                        <ul id="fh5co-gallery-list">';

        /** @var Album $album */
        foreach (Album::find()->orderBy('sortOrder')->all() as $album){
            $title = $album->title;
            $album_id = $album->id;
            $modal_id = 'album-modal-'.$album_id;
            $images = $album->getBehavior('galleryBehavior')->getImages();
            $count = count($images);
            $first_image = ($count != 0) ? $images[0]->getUrl('medium') : '';
            $new_page_url = Url::to(['album/show','id' => $album_id]);

            if ($count != 0)
                echo '<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url('.$first_image.'); ">
                                <a data-target="#'.$modal_id.'" href="#'.$modal_id.'" data-toggle="modal">
                                <!--<a href="'.$new_page_url.'" target="_blank"> -->
                                    <div class="case-studies-summary">
                                        <span>'.$count.' Фото</span>
                                        <h2>'.$title.'</h2>
                                    </div>
                                </a>
                            </li>';
        }

        echo '<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/Add_Circle_Plus.png); ">
                            <a href="/album/create">
                                <div class="case-studies-summary">
                                    <span></span>
                                    <h2>Добавить свой альбом</h2>
                                </div>
                            </a>
                        </li>';
            echo '      </ul>
                    </div>
                </div>';

        /** @var Album $album */
        foreach (Album::find()->all() as $album){
            $title = $album->title;
            $album_id = $album->id;
            $modal_id = 'album-modal-'.$album_id;
            $images = $album->getBehavior('galleryBehavior')->getImages();
            $count = count($images);

            echo ModalAjax::widget([
                'id' => $modal_id,
                'header' => '<h2>'.$title.'</h2>',
                'url' => Url::to(['/album/ajax-show', 'id' => $album_id]),
                'ajaxSubmit' => true,
                'footer' => ($album->common) ? Html::a('Добавить фото',['album/update', 'key' => $album->key],['class' => 'btn btn-primary']) : ''
            ]);

//            Modal::begin([
//                'id' => $modal_id,
//                'header' => '<h2>'.$title.'</h2>',
////                'footer' => 'Низ окна',
//            ]);
//
//            $fotorama = \metalguardian\fotorama\Fotorama::begin(
//                [
//                    'options' => [
//                        'loop' => true,
//                        'hash' => true,
//                        'ratio' => 800/600,
//                        'nav' => 'thumbs',
//                        'allowfullscreen' => 'native'
//                    ],
//                    'spinner' => [
//                        'lines' => 20,
//                    ],
//                    'tagName' => 'span',
//                    'useHtmlData' => false,
//                ]
//            );
//
//            foreach($images as $image) {
//                echo Html::img($image->getUrl('medium'), ['data-full' => $image->getUrl('original')]);
//            }
//
//            \metalguardian\fotorama\Fotorama::end();
//
//            Modal::end();
        }
    }
}
