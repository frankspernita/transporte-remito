<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Camionero;
use frontend\models\CamioneroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
/**
 * CamioneroController implements the CRUD actions for Camionero model.
 */
class CamioneroController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                [
                'allow' => true,
                'roles' => ['@'],
              ],
              ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Camionero models.
     * @return mixed
     */
    public function actionIndex($i = 0)
    {
        $searchModel = new CamioneroSearch();
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Camionero model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Camionero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Camionero();        

        if ($model->load(Yii::$app->request->post())) {
            $model->Estado = 'Activo';       
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view',
                        'id' => $model->idCamionero
                      ]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Camionero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->idCamionero = $id;            
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view',
                        'id' => $model->idCamionero
                      ]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Camionero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
      if($model->Estado == 'Inactivo'){
          $model->Estado = 'Activo';
      }else{
          $model->Estado = 'Inactivo';
      }
      $model->save();

        return $this->redirect(['index', 'id' => $model->idCamionero]);
    }

    /**
     * Finds the Camionero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Camionero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Camionero::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionDocs($id)
    {
        return $this->render('docs', [
            'model' => $this->findModel($id),
        ]);
    }
}
