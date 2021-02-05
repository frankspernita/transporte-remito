<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Remito;
use frontend\models\RemitoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Lineasremito;
use frontend\models\LineasremitoSearch;
use yii\filters\AccessControl;
use frontend\models\Model;
use kartik\mpdf\Pdf;
use frontend\models\Personas;
use frontend\models\Camionero;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * RemitoController implements the CRUD actions for Remito model.
 */
class RemitoController extends Controller
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
     * Lists all Remito models.
     * @return mixed
     */
    public function actionIndex($i = 0)
    {
        $searchModel = new RemitoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 100,];
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    /**
     * Displays a single Remito model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    public function actionIndexpagos($i = 0)
    {
        $searchModel = new RemitoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        return $this->render('indexpagos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    /**
     * Displays a single Remito model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   

    public function actionDocs($id, $i = 0)
    {
        $searchModel = new RemitoSearch();
        $searchModel->idPersona = $id;
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelClient = Personas::findOne($id);
        $modelClient->load(Yii::$app->request->queryParams);

        return $this->render('docs', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelClient' => $modelClient,
        ]);
    }

    /**
     * Displays a single Remito model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDocspagos($id)
    {
        $searchModel = new RemitoSearch();
        $searchModel->idCamionero = $id;
   //     $searchModel->Estado = $i == 0 ? 'Activo' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelClient = Camionero::findOne($id);
        $modelClient->load(Yii::$app->request->queryParams);

        return $this->render('docspagos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelClient' => $modelClient,
        ]);
    }

    /**
     * Displays a single Remito model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView($id)
    {
        $searchModel = new LineasremitoSearch();
        $searchModel->idRemito = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Remito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Remito();
       // $model->idPersona = $id;
        $modelsLineas = [new Lineasremito];
        $listaPersonas = ArrayHelper::map(Personas::find()->where(['Estado' => 'Activo'])->all(),'idPersona','Nombre');
        $listaCamionero = ArrayHelper::map(Camionero::find()->where(['Estado' => 'Activo'])->all(),'idCamionero','Nombre');
        $remitocount = Remito::find()->count() + 1;

        if ($model->load(Yii::$app->request->post())) {
            $modelsLineas = Model::createMultiple(Lineasremito::classname());
          //  $model->Fecha = date('Y-m-d');
            $model->Estado = 'Activo';
            $model->Cobrado = 0;
            $model->Fecha = Yii::$app->formatter->asDatetime($model->Fecha, 'y-M-d 00:00:00');
            $model->Diferencia = $model->Total;
            Model::loadMultiple($modelsLineas, Yii::$app->request->post());
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsLineas) && $valid;
            if($valid){
                $transaction = \Yii::$app->db->beginTransaction();
                try {

                    if ($flag = $model->save(false)) {
                        
                        foreach ($modelsLineas as $modelLinea) {
                            
                            $modelLinea->idRemito = $model->idRemito;
                            if (! ($flag = $modelLinea->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {                        
                        $transaction->commit();
                        
                        return $this->redirect(['view','id' => $model->idRemito]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'listapersonas' => $listaPersonas,
            'listacamionero' => $listaCamionero,            
            'remitocount' => $remitocount,
            'modelsLineas' => (empty($modelsLineas)) ? [new Lineasremito] : $modelsLineas,
        ]);
    }

    /**
     * Updates an existing Remito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsLineas = $model->lineasremito;
        $listaPersonas = ArrayHelper::map(Personas::find()->where(['Estado' => 'Activo'])->all(),'idPersona','Nombre');
        $listaCamionero = ArrayHelper::map(Camionero::find()->where(['Estado' => 'Activo'])->all(),'idCamionero','Nombre');
        if ($model->load(Yii::$app->request->post())) {
            
            $model->Fecha = Yii::$app->formatter->asDatetime($model->Fecha, 'y-M-d 00:00:00');
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsLineas) && $valid;
            
            $oldIDs = ArrayHelper::map($modelsLineas, 'idLineasRemitos', 'idRemito');
            $modelsLineas = Model::createMultiple(Lineasremito::classname(), $modelsLineas, 'Remito', 'LineasRemitos');
            Model::loadMultiple($modelsLineas, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsLineas, 'idLineasRemitos', 'idRemito')));
            if($valid){
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            Lineasremito::deleteAll('idRemito = '.$model->idRemito);
                        }
                        foreach ($modelsLineas as $modelLinea) {
                            
                            $modelLinea->idRemito = $model->idRemito;
                            
                            if (! ($flag = $modelLinea->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idRemito]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            return $this->redirect(['view', 'id' => $model->idRemito]);
        }

        return $this->render('update', [
            'model' => $model,
            'listapersonas' => $listaPersonas,
            'listacamionero' => $listaCamionero,  
            'modelsLineas' => $model->lineasremito,
        ]);
    }

    /**
     * Deletes an existing Remito model.
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

        return $this->redirect(['index', 'id' => $model->idRemito]);
    }

    /**
     * Finds the Remito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Remito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Remito::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrint($id)
    {
        $modcot = $this->findModel($id);
        $listaLineas = $modcot->lineasremito;
        $modper = $modcot->persona;
        $modperdes = $modcot->destinatario;
        $content = $this->renderPartial('_print',[
                                                 'model' => $modcot,
                                                 'cliente' => $modper,
                                                 'destino' => $modperdes,
                                                 'modelsLineas' => $listaLineas,
                                                 ]);
    
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
//             'cssFile' => '@frontend/web/css/bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Transportes LEILA'],
             // call mPDF methods on the fly
            'methods' => [ 
                          'SetHeader'=>['Transportes LEILA|Remito| ' ], 
                'SetFooter'=>['página {PAGENO} de {nb}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }


}
