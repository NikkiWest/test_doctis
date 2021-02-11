<?php


namespace app\controllers;


use app\assets\TaskAsset;
use app\models\Result;
use app\models\search\TaskSearch;
use app\models\Task;
use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap\Html;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class TaskController extends Controller
{

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'only' => [
                    'delete',
                ],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ]);
    }

    public function beforeAction($action)
    {
        try {
            $this->view->registerAssetBundle(TaskAsset::class, \yii\web\View::POS_BEGIN);
        } catch (InvalidConfigException $e) {
            echo $e->getMessage();
            echo $e->getTraceAsString();
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        return $this->render('index', ['dataProvider' => $searchModel->search(Yii::$app->request->queryParams)]);
    }

    public function actionCreate()
    {
        $model = new Task();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete()
    {
        $model = $this->findModel(Yii::$app->request->post('id'));
        if (!empty($model)) {
            if (!$model->delete()){
                return Result::json(false, Html::errorSummary($model));
            }
            return Result::json(true, 'ok!');
        }
    }

    /**
     * @param $id
     * @return Task|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Такой задачи не существует');
    }
}