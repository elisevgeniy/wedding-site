<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

class Settings extends Model
{
    const CATEGORY = "settings";

    const DATE = "date";
    const DATE_BEFORE_TEXT = "date_before_text";
    const DATE_AFTER_TEXT = "date_after_text";
    const TITLE = "title";
    const HEAD_TITLE = "head_title";
    const HEAD_BACKGROUND = "head_background";
    const HUSBAND_NAME = "husband_name";
    const WIFE_NAME = "wife_name";
    const HUSBAND_PHOTO = "husband_photo";
    const WIFE_PHOTO = "wife_photo";
    const INVITATION_TITLE = "invitation_title";
    const INVITATION_TEXT = "invitation_text";
    const HUSBAND_INVITATION = "husband_invitation";
    const WIFE_INVITATION = "wife_invitation";
    const SEATING_PLAN_IMAGE = "seating_plan_image";
    const COUPLE_STORY_PRETITLE = "couple_story_pretitle";
    const COUPLE_STORY_TITLE = "couple_story_title";
    const COUPLE_STORY_TEXT = "couple_story_text";
    const ALBUM_TITLE = "album_title";
    const ALBUM_TEXT = "album_text";
    const ALBUM_VIDEO_ENABLE = "album_video_enable";
    const ALBUM_VIDEO_FFMPEG_PATH = "album_video_ffmpeg_path";
    const SERVICES_TITLE = "services_title";
    const SERVICES_TEXT = "services_text";
    const EVENT_TITLE = "event_title";
    const EVENT_TEXT = "event_text";
    const EVENT_BACKGROUND = "event_background";
    const EVENT_POSTSCRIPT = "event_postscript";

    public $date;
    public $date_before_text;
    public $date_after_text;
    public $title;
    public $head_title;
    public $head_background;
    public $husband_name;
    public $wife_name;
    public $husband_photo;
    public $wife_photo;
    public $invitation_title;
    public $invitation_text;
    public $husband_invitation;
    public $wife_invitation;
    public $seating_plan_image;
    public $couple_story_pretitle;
    public $couple_story_title;
    public $couple_story_text;
    public $album_title;
    public $album_text;
    public $album_video_enable;
    public $album_video_ffmpeg_path;
    public $services_title;
    public $services_text;
    public $event_title;
    public $event_text;
    public $event_background;
    public $event_postscript;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['husband_name', 'wife_name', 'date', 'husband_invitation', 'wife_invitation', 'invitation_title'], 'required'],
            [['date'], 'safe'],
            [['album_video_enable'], 'boolean'],
            [['husband_name', 'wife_name'], 'string', 'max' => 50],
            [[
                'invitation_text',
                'invitation_title',
                'title',
                'head_title',
                'head_background',
                'date_before_text',
                'date_after_text',
                'husband_invitation',
                'wife_invitation',
                'husband_photo',
                'wife_photo',
                'seating_plan_image',
                'couple_story_pretitle',
                'couple_story_title',
                'couple_story_text',
                'album_title',
                'album_text',
                'album_video_ffmpeg_path',
                'services_title',
                'services_text',
                'event_title',
                'event_text',
                'event_background',
                'event_postscript',
            ], 'string', 'max' => 511],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date' => 'Дата и время регистации',
            'date_before_text' => 'Текст до конца счётчика',
            'date_after_text' => 'Текст после кона счётчика',
            'husband_name' => 'Имя жениха',
            'wife_name' => 'Имя невесты',
            'title' => 'Заголовок',
            'head_title' => 'Текст в шапке сайта',
            'head_background' => 'Фон в шапке сайта',
            'invitation_title' => 'Заголовок приглашения',
            'invitation_text' => 'Текст приглашения',
            'husband_invitation' => 'Текст приглашения от жениха',
            'wife_invitation' => 'Текст приглашения от невесты',
            'husband_photo' => 'Ссылка на фотографию мужа',
            'wife_photo' => 'Ссылка на фотографию жены',
            'seating_plan_image' => 'Ссылка на фотографию плана рассадки',
            'couple_story_pretitle' => 'Текст перед заголовком',
            'couple_story_title' => 'Заголовок',
            'couple_story_text' => 'Текст после заголовка',
            'album_title' => 'Загловок',
            'album_text' => 'Текст после заголовка',
            'album_video_enable' => 'Загрузка видео в альбомы',
            'album_video_ffmpeg_path' => 'Путь к модулю ffmpeg',
            'services_title' => 'Заголовок',
            'services_text' => 'Текст после заголовка',
            'event_title' => 'Заголовок',
            'event_text' => 'Текст после заголовка',
            'event_background' => 'Ссылка на фоновое изображение',
            'event_postscript' => 'Текст после списка событий',
        ];
    }

    public function attributeHints()
    {
        return [
            'date' => 'Счётчик после окончания начнёт считать вверх',
            'invitation_text' => 'Не более 512 символов',
            'husband_invitation' => 'Не более 512 символов',
            'wife_invitation' => 'Не более 512 символов',
            'husband_photo' => 'Фото должно быть квадратным, не менее 150x150 px',
            'wife_photo' => 'Фото должно быть квадратным, не менее 150x150 px',
            'seating_plan_image' => 'Фото должно быть по высоте менее 900px',
            'couple_story_pretitle' => 'Не более 512 символов',
            'couple_story_title' => 'Не более 512 символов',
            'couple_story_text' => 'Не более 512 символов',
            'album_title' => 'Не более 512 символов',
            'album_text' => 'Не более 512 символов',
            'album_video_enable' => 'Для возможности загрузки видео на сервере должен быть установлен ' . Html::a('ffmpeg', 'https://ffmpeg.org/', ['target' => '_blank']),
            'services_title' => 'Не более 512 символов',
            'services_text' => 'Не более 512 символов',
            'event_postscript' => 'Поддерживается HTML. Если не заполнено, то отображаться не будет',
        ];
    }


    public static function get()
    {
        $settings = Yii::$app->settings;
        return new Settings([
            'date' => $settings->get(self::CATEGORY, self::DATE, ''),
            'date_before_text' => $settings->get(self::CATEGORY, self::DATE_BEFORE_TEXT, ''),
            'date_after_text' => $settings->get(self::CATEGORY, self::DATE_AFTER_TEXT, ''),
            'husband_name' => $settings->get(self::CATEGORY, self::HUSBAND_NAME, ''),
            'wife_name' => $settings->get(self::CATEGORY, self::WIFE_NAME, ''),
            'husband_photo' => $settings->get(self::CATEGORY, self::HUSBAND_PHOTO, ''),
            'wife_photo' => $settings->get(self::CATEGORY, self::WIFE_PHOTO, ''),
            'title' => $settings->get(self::CATEGORY, self::TITLE, ''),
            'head_title' => $settings->get(self::CATEGORY, self::HEAD_TITLE, ''),
            'head_background' => $settings->get(self::CATEGORY, self::HEAD_BACKGROUND, ''),
            'invitation_title' => $settings->get(self::CATEGORY, self::INVITATION_TITLE, ''),
            'invitation_text' => $settings->get(self::CATEGORY, self::INVITATION_TEXT, ''),
            'husband_invitation' => $settings->get(self::CATEGORY, self::HUSBAND_INVITATION, ''),
            'wife_invitation' => $settings->get(self::CATEGORY, self::WIFE_INVITATION, ''),
            'seating_plan_image' => $settings->get(self::CATEGORY, self::SEATING_PLAN_IMAGE, ''),
            'couple_story_pretitle' => $settings->get(self::CATEGORY, self::COUPLE_STORY_PRETITLE, ''),
            'couple_story_title' => $settings->get(self::CATEGORY, self::COUPLE_STORY_TITLE, ''),
            'couple_story_text' => $settings->get(self::CATEGORY, self::COUPLE_STORY_TEXT, ''),
            'album_title' => $settings->get(self::CATEGORY, self::ALBUM_TITLE, ''),
            'album_text' => $settings->get(self::CATEGORY, self::ALBUM_TEXT, ''),
            'album_video_enable' => ($settings->get(self::CATEGORY, self::ALBUM_VIDEO_ENABLE, '0') == '1') ? true : false,
            'album_video_ffmpeg_path' => $settings->get(self::CATEGORY, self::ALBUM_VIDEO_FFMPEG_PATH, '/usr/bin/ffmpeg'),
            'services_title' => $settings->get(self::CATEGORY, self::SERVICES_TITLE, ''),
            'services_text' => $settings->get(self::CATEGORY, self::SERVICES_TEXT, ''),
            'event_title' => $settings->get(self::CATEGORY, self::EVENT_TITLE, ''),
            'event_text' => $settings->get(self::CATEGORY, self::EVENT_TEXT, ''),
            'event_background' => $settings->get(self::CATEGORY, self::EVENT_BACKGROUND, ''),
            'event_postscript' => $settings->get(self::CATEGORY, self::EVENT_POSTSCRIPT, ''),
        ]);
    }

    public function save()
    {

        if ($this->validate()) {

            /** @var \yii2mod\settings\components\Settings $settings */
            $settings = Yii::$app->settings;

            $settings->set(self::CATEGORY, self::DATE, $this->date);
            $settings->set(self::CATEGORY, self::DATE_BEFORE_TEXT, $this->date_before_text);
            $settings->set(self::CATEGORY, self::DATE_AFTER_TEXT, $this->date_after_text);
            $settings->set(self::CATEGORY, self::HUSBAND_NAME, $this->husband_name);
            $settings->set(self::CATEGORY, self::WIFE_NAME, $this->wife_name);
            $settings->set(self::CATEGORY, self::HUSBAND_PHOTO, $this->husband_photo);
            $settings->set(self::CATEGORY, self::WIFE_PHOTO, $this->wife_photo);
            $settings->set(self::CATEGORY, self::TITLE, $this->title);
            $settings->set(self::CATEGORY, self::HEAD_TITLE, $this->head_title);
            $settings->set(self::CATEGORY, self::HEAD_BACKGROUND, $this->head_background);
            $settings->set(self::CATEGORY, self::INVITATION_TITLE, $this->invitation_title);
            $settings->set(self::CATEGORY, self::INVITATION_TEXT, $this->invitation_text);
            $settings->set(self::CATEGORY, self::HUSBAND_INVITATION, $this->husband_invitation);
            $settings->set(self::CATEGORY, self::WIFE_INVITATION, $this->wife_invitation);
            $settings->set(self::CATEGORY, self::SEATING_PLAN_IMAGE, $this->seating_plan_image);
            $settings->set(self::CATEGORY, self::COUPLE_STORY_PRETITLE, $this->couple_story_pretitle);
            $settings->set(self::CATEGORY, self::COUPLE_STORY_TITLE, $this->couple_story_title);
            $settings->set(self::CATEGORY, self::COUPLE_STORY_TEXT, $this->couple_story_text);
            $settings->set(self::CATEGORY, self::ALBUM_TITLE, $this->album_title);
            $settings->set(self::CATEGORY, self::ALBUM_TEXT, $this->album_text);
            $settings->set(self::CATEGORY, self::ALBUM_VIDEO_ENABLE, ($this->album_video_enable) ? '1' : '0');
            $settings->set(self::CATEGORY, self::ALBUM_VIDEO_FFMPEG_PATH, $this->album_video_ffmpeg_path);
            $settings->set(self::CATEGORY, self::SERVICES_TITLE, $this->services_title);
            $settings->set(self::CATEGORY, self::SERVICES_TEXT, $this->services_text);
            $settings->set(self::CATEGORY, self::EVENT_TITLE, $this->event_title);
            $settings->set(self::CATEGORY, self::EVENT_TEXT, $this->event_text);
            $settings->set(self::CATEGORY, self::EVENT_BACKGROUND, $this->event_background);
            $settings->set(self::CATEGORY, self::EVENT_POSTSCRIPT, $this->event_postscript);

            if (empty($this->date_before_text)) $settings->remove(self::CATEGORY, self::DATE_BEFORE_TEXT);
            if (empty($this->date_after_text)) $settings->remove(self::CATEGORY, self::DATE_AFTER_TEXT);
            if (empty($this->title)) $settings->remove(self::CATEGORY, self::TITLE);
            if (empty($this->head_title)) $settings->remove(self::CATEGORY, self::HEAD_TITLE);
            if (empty($this->head_background)) $settings->remove(self::CATEGORY, self::HEAD_BACKGROUND);
            if (empty($this->invitation_title)) $settings->remove(self::CATEGORY, self::INVITATION_TITLE);
            if (empty($this->invitation_text)) $settings->remove(self::CATEGORY, self::INVITATION_TEXT);
            if (empty($this->husband_invitation)) $settings->remove(self::CATEGORY, self::HUSBAND_INVITATION);
            if (empty($this->wife_invitation)) $settings->remove(self::CATEGORY, self::WIFE_INVITATION);
            if (empty($this->couple_story_pretitle)) $settings->remove(self::CATEGORY, self::COUPLE_STORY_PRETITLE);
            if (empty($this->couple_story_title)) $settings->remove(self::CATEGORY, self::COUPLE_STORY_TITLE);
            if (empty($this->couple_story_text)) $settings->remove(self::CATEGORY, self::COUPLE_STORY_TEXT);
            if (empty($this->album_title)) $settings->remove(self::CATEGORY, self::ALBUM_TITLE);
            if (empty($this->album_text)) $settings->remove(self::CATEGORY, self::ALBUM_TEXT);
            if (empty($this->services_title)) $settings->remove(self::CATEGORY, self::SERVICES_TITLE);
            if (empty($this->services_text)) $settings->remove(self::CATEGORY, self::SERVICES_TEXT);
            if (empty($this->event_title)) $settings->remove(self::CATEGORY, self::EVENT_TITLE);
            if (empty($this->event_text)) $settings->remove(self::CATEGORY, self::EVENT_TEXT);
            if (empty($this->event_postscript)) $settings->remove(self::CATEGORY, self::EVENT_POSTSCRIPT);

            return true;
        } else {
            return false;
        }
    }

    public function getDateTimestamp()
    {
        return strtotime($this->date);
    }

    public function getDateFormat($format){
//        $date = new DateTime('2000-01-01');
        return Yii::$app->formatter->asDatetime($this->date, 'php:'.$format);
    }

    public function getTimestampFormat(){
        return Yii::$app->formatter->asTimestamp($this->date);
    }

    public function isSetEventPostscript (){
        if (empty($this->event_postscript))
            return false;
        else
            return true;
    }
}
