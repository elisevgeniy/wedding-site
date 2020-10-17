<?php

/* @var $this yii\web\View */
/** @var \app\models\Settings $settings */

use yii\bootstrap\Modal;

$this->registerJsVar('wedding_date', $settings->getTimestampFormat());
$this->registerJsVar('date_before_text', $settings->date_before_text);
$this->registerJsVar('date_after_text', $settings->date_after_text);

?>
<div class="site-index">

    <div class="fh5co-loader"></div>

    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="/"><?= $settings->head_title ?><strong>.</strong></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
<!--                            <li class="active"><a href="#fh5co-header">Главная</a></li>-->
                            <li><a href="#fh5co-event">Расписание</a></li>
                            <li><a href="#fh5co-table">План рассадки</a></li>
                            <li><a href="#fh5co-couple-story">Наша история</a></li>
                            <li><a href="#fh5co-services">Наши свадебные специалисты</a></li>
                            <li><a href="#fh5co-gallery">Галерея</a></li>
<!--                            <li><a href="#fh5co-testimonial">Пожелания</a></li>-->
                            <li class="has-dropdown">
                                <a>Прочее</a>
                                <ul class="dropdown">
                                    <li><a href="/album/create">Добавить новый альбом</a></li>
                                    <li><a href="/album/key">Изменить по ключу доступа</a></li>
                                    <li><a href="/album/">Панель управления</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <header id="fh5co-header" class="fh5co-cover" role="banner" data-stellar-background-ratio="0.5" style="background-image:url(<?= $settings->head_background ?>)">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1><?= $settings->title ?></h1>
                                <h2><p class="simply-countdown-text"><?= $settings->date_before_text ?></p></h2>
                                <div class="simply-countdown simply-countdown-one"></div>
                                <!--							<p><a href="#" class="btn btn-default btn-sm">Save the date</a></p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="fh5co-couple">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <h2><?= $settings->invitation_title ?></h2>
                        <h3><?= $settings->getDateFormat("d F Y") ?></h3>
                        <p><?= $settings->invitation_text ?></p>
                    </div>
                </div>
                <div class="couple-wrap animate-box">
                    <div class="couple-half">
                        <div class="groom">
                            <img src="<?= $settings->husband_photo ?>" alt="groom" class="img-responsive">
                        </div>
                        <div class="desc-groom">
                            <h3><?= $settings->husband_name ?></h3>
                            <p><?= $settings->husband_invitation ?></p>
                        </div>
                    </div>
                    <p class="heart text-center"><i class="icon-heart2"></i></p>
                    <div class="couple-half">
                        <div class="bride">
                            <img src="<?= $settings->wife_photo ?>" alt="groom" class="img-responsive">
                        </div>
                        <div class="desc-bride">
                            <h3><?= $settings->wife_name ?></h3>
                            <p><?= $settings->wife_invitation ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-event" class="fh5co-bg" style="background-image:url(<?= $settings->event_background ?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <!--					<span>Our Special Events</span>-->
                        <h2>Свадебный день</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <?= \app\widgets\EventWidget::widget() ?>

                        <?php

                        if ($settings->isSetEventPostscript()){
                            echo "
                        <div class=\"col-md-12 col-sm-12 text-center\">
                            <div class=\"event-wrap animate-box\" style=\"padding: 10px 0 0 0; margin-top: 10px\">
                                <p style=\"font-size: x-large\">{$settings->event_postscript}</p>
                            </div>
                        </div>";
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-table" class="fh5co-bg fh5co-section-gray" style="text-align: center">
            <div class="container">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>План рассадки</h2>
                </div>
                <div class="overlay"></div>
                <img src="<?= $settings->seating_plan_image ?>" style="width: 100%; height: auto; max-width: 900px">
            </div>
        </div>

        <div id="fh5co-couple-story">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <span><?= $settings->couple_story_pretitle ?></span>
                        <h2><?= $settings->couple_story_title ?></h2>
                        <p><?= $settings->couple_story_text ?></p>
                    </div>
                </div>

                <?= \app\widgets\CoupleStoryWidget::widget() ?>

            </div>
        </div>

        <div id="fh5co-services" class="fh5co-section-gray">
            <div class="container">

                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2><?= $settings->services_title ?></h2>
                        <p><?= $settings->services_text ?></p>
                    </div>
                </div>

                <div class="row">

                    <?= \app\widgets\ServiceWidget::widget() ?>

                    <!--                    <div class="col-md-6 animate-box">-->
                    <!--                        <div class="fh5co-video fh5co-bg" style="background-image: url(images/img_bg_3.jpg); ">-->
                    <!--                            <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>-->
                    <!--                            <div class="overlay"></div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>

        <!--        <div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/img_bg_4.jpg);">-->
        <!--            <div class="overlay"></div>-->
        <!--            <div class="container">-->
        <!--                <div class="row animate-box">-->
        <!--                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">-->
        <!--                        <h2>Are You Attending?</h2>-->
        <!--                        <p>Please Fill-up the form to notify you that you're attending. Thanks.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="row animate-box">-->
        <!--                    <div class="col-md-10 col-md-offset-1">-->
        <!--                        <form class="form-inline">-->
        <!--                            <div class="col-md-4 col-sm-4">-->
        <!--                                <div class="form-group">-->
        <!--                                    <label for="name" class="sr-only">Name</label>-->
        <!--                                    <input type="name" class="form-control" id="name" placeholder="Name">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-md-4 col-sm-4">-->
        <!--                                <div class="form-group">-->
        <!--                                    <label for="email" class="sr-only">Email</label>-->
        <!--                                    <input type="email" class="form-control" id="email" placeholder="Email">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-md-4 col-sm-4">-->
        <!--                                <button type="submit" class="btn btn-default btn-block">I am Attending</button>-->
        <!--                            </div>-->
        <!--                        </form>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

        <div id="fh5co-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">

                        <h2><?= $settings->album_title ?></h2>
                        <p><?= $settings->album_text ?></p>
                    </div>
                </div>

            <?= \app\widgets\Gallery::widget() ?>

            </div>
        </div>

<!--        <div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">-->
<!--            <div class="overlay"></div>-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="display-t">-->
<!--                        <div class="display-tc">-->
<!--                            <div class="col-md-3 col-sm-6 animate-box">-->
<!--                                <div class="feature-center">-->
<!--								<span class="icon">-->
<!--									<i class="icon-users"></i>-->
<!--								</span>-->
<!---->
<!--                                    <span class="counter js-counter" data-from="0" data-to="500" data-speed="5000" data-refresh-interval="50">1</span>-->
<!--                                    <span class="counter-label">Estimated Guest</span>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-3 col-sm-6 animate-box">-->
<!--                                <div class="feature-center">-->
<!--								<span class="icon">-->
<!--									<i class="icon-user"></i>-->
<!--								</span>-->
<!---->
<!--                                    <span class="counter js-counter" data-from="0" data-to="1000" data-speed="5000" data-refresh-interval="50">1</span>-->
<!--                                    <span class="counter-label">We Catter</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-3 col-sm-6 animate-box">-->
<!--                                <div class="feature-center">-->
<!--								<span class="icon">-->
<!--									<i class="icon-calendar"></i>-->
<!--								</span>-->
<!--                                    <span class="counter js-counter" data-from="0" data-to="402" data-speed="5000" data-refresh-interval="50">1</span>-->
<!--                                    <span class="counter-label">Events Done</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-3 col-sm-6 animate-box">-->
<!--                                <div class="feature-center">-->
<!--								<span class="icon">-->
<!--									<i class="icon-clock"></i>-->
<!--								</span>-->
<!---->
<!--                                    <span class="counter js-counter" data-from="0" data-to="2345" data-speed="5000" data-refresh-interval="50">1</span>-->
<!--                                    <span class="counter-label">Hours Spent</span>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div id="fh5co-testimonial">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="row animate-box">-->
<!--                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">-->
<!--                            <span>Best Wishes</span>-->
<!--                            <h2>Friends Wishes</h2>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-12 animate-box">-->
<!--                            <div class="wrap-testimony">-->
<!--                                <div class="owl-carousel-fullwidth">-->
<!--                                    <div class="item">-->
<!--                                        <div class="testimony-slide active text-center">-->
<!--                                            <figure>-->
<!--                                                <img src="images/couple-1.jpg" alt="user">-->
<!--                                            </figure>-->
<!--                                            <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>-->
<!--                                            <blockquote>-->
<!--                                                <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics"</p>-->
<!--                                            </blockquote>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="item">-->
<!--                                        <div class="testimony-slide active text-center">-->
<!--                                            <figure>-->
<!--                                                <img src="images/couple-2.jpg" alt="user">-->
<!--                                            </figure>-->
<!--                                            <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>-->
<!--                                            <blockquote>-->
<!--                                                <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, at the coast of the Semantics, a large language ocean."</p>-->
<!--                                            </blockquote>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="item">-->
<!--                                        <div class="testimony-slide active text-center">-->
<!--                                            <figure>-->
<!--                                                <img src="images/couple-3.jpg" alt="user">-->
<!--                                            </figure>-->
<!--                                            <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>-->
<!--                                            <blockquote>-->
<!--                                                <p>"Far far away, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."</p>-->
<!--                                            </blockquote>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <footer id="fh5co-footer" role="contentinfo">
            <div class="container">

                <div class="row copyright">
                    <div class="col-md-12 text-center">
                        <p>
                            <small class="block">&copy; 2019-2020 elisevgeniy.</small>
                            <small class="block">Основано на шаблоне <a href="https://freehtml5.co/wedding-free-html5-bootstrap-template-for-wedding-websites/" target="_blank">FREEHTML5.co</a> и доработано <a href="https://kusok-piro.ga/portfolio/">elisevgeniy</a></small>
                            <small class="block">Иконки сделаны <a href="https://www.flaticon.com/authors/pixelmeetup" title="Pixelmeetup">Pixelmeetup</a></small>
                            <small class="block">Иконки <a href="https://icomoon.io" title="Pixelmeetup">icomoon.io</a></small>
                        </p>
                        <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="https://vk.com/id5327166"><i class="icon-vk"></i></a></li>
                            <li><a href="tg://resolve?domain=elisevgeniy"><i class="icon-paper-plane"></i></a></li>
                            <li><a href="https://kusok-piro.ga/contact"><i class="icon-globe"></i></a></li>
                            <li><a href="mailto:elisevgeniy@gmail.com"><i class="icon-email"></i></a></li>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <?= \app\widgets\Notification::widget() ?>
</div>
