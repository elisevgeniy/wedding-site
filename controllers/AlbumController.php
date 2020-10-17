<?php

namespace app\controllers;

use himiklab\sortablegrid\SortableGridAction;
use Yii;
use app\models\Album;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use zxbodya\yii2\galleryManager\GalleryManagerAction;

/**
 * AlbumController implements the CRUD actions for Album model.
 */
class AlbumController extends Controller
{
    public $layout = 'album';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','setCommon', 'delete'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
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

    public function actions()
    {
        return [
            'galleryApi' => [
                'class' => GalleryManagerAction::className(),
                'types' => [
                    'album' => Album::className()
                ]
            ],
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => Album::className(),
            ],
        ];
    }

    /**
     * Lists all Album models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Album::find(),
            'sort'=> [
                'defaultOrder' => ['sortOrder' => SORT_ASC],
                'attributes' => ['sortOrder']
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Album model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($key)
    {
        $model = $this->findModelByKey($key);

        if (is_null($model)) {
            Yii::$app->session->setFlash('error', 'Альбом с ключом ' .$key. ' не найден');
            return $this->redirect('/album/key');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionShow($id)
    {
        $this->layout = 'fullscreen';

        return $this->render('show', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAjaxShow($id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('ajaxshow', [
                'model' => $this->findModel($id),
            ]);
        } else {

            $this->layout = 'fullscreen';

            return $this->render('ajaxshow', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $model = new Album();

        if ($model->load(Yii::$app->request->post())) {

            if (!Yii::$app->user->isGuest)
                $model->user_id = Yii::$app->user->id;

            $model->key = $this->generateKey();

            if ($model->save())
                return $this->redirect(['update', 'key' => $model->key, 'showKey' => true]);

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Album model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $key
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($key)
    {
        $model = $this->findModelByKey($key);

        if (is_null($model)) {
            Yii::$app->session->setFlash('error', 'Альбом с ключом ' .$key. ' не найден');
            return $this->redirect('/album/key');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'key' => $model->key]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Album model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSetCommon($id)
    {
        $model = $this->findModel($id);
        $model->common = !$model->common;
        $model->save();

        $this->redirect(Yii::$app->request->referrer);
    }

    public function actionResetKey($id)
    {
        $model = $this->findModel($id);
        $model->key = $this->generateKey();
        $model->save();

        Yii::$app->session->setFlash('success', 'Новый ключ: ' . $model->key);

        $this->redirect(['album/view', 'key' => $model->key]);
    }

    public function actionKey($key = '')
    {
        $model = $this->findModelByKey($key);
        if (is_null($model)) {
            if ($key != '')
                Yii::$app->session->setFlash('error', 'Альбом с ключом ' .$key. ' не найден');
            return $this->render('key', ['key' => $key]);
            }
        else
            return $this->redirect(['view', 'key' => $model->key]);
    }

    /**
     * Finds the Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelByKey($key)
    {
        if (($model = Album::findOne(['key' => $key])) !== null) {
            return $model;
        } else {
            return null;
        }
    }
    private function generateKey(){
        return Yii::$app->getSecurity()->generateRandomString(5);
    }
}
