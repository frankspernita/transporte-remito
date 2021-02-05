<?php

namespace backend\controllers;

use Yii;
use backend\models\LineasCot;
use backend\models\LineasCotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LineasCotController implements the CRUD actions for LineasCot model.
 */
class LineasCotController extends Controller
{
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
        ];
    }

    /**
     * Lists all LineasCot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LineasCotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LineasCot model.
     * @param integer $idLineaCot
     * @param string $idCotizacion
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLineaCot, $idCotizacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($idLineaCot, $idCotizacion),
        ]);
    }

    /**
     * Creates a new LineasCot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LineasCot();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLineaCot' => $model->idLineaCot, 'idCotizacion' => $model->idCotizacion]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LineasCot model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idLineaCot
     * @param string $idCotizacion
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLineaCot, $idCotizacion)
    {
        $model = $this->findModel($idLineaCot, $idCotizacion);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLineaCot' => $model->idLineaCot, 'idCotizacion' => $model->idCotizacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LineasCot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idLineaCot
     * @param string $idCotizacion
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLineaCot, $idCotizacion)
    {
        $this->findModel($idLineaCot, $idCotizacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LineasCot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idLineaCot
     * @param string $idCotizacion
     * @return LineasCot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLineaCot, $idCotizacion)
    {
        if (($model = LineasCot::findOne(['idLineaCot' => $idLineaCot, 'idCotizacion' => $idCotizacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
