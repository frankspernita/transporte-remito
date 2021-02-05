<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Pagosremito;
use frontend\models\PagosremitoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Remito;
use frontend\models\RemitoSearch;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * PagosremitoController implements the CRUD actions for Pagosremito model.
 */
class PagosremitoController extends Controller
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
     * Lists all Pagosremito models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagosremitoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pagosremito model.
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
     * Creates a new Pagosremito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pagosremito();        
        $listaRemito = ArrayHelper::map(Remito::find()->where(['Estado' => 'Activo'])->all(),'idRemito','Codigo');

        if ($model->load(Yii::$app->request->post())) {
            $model->Estado = 'Activo';
            $model->Fecha = date('Y-m-d');
            $model->Fecha = Yii::$app->formatter->asDatetime($model->Fecha, 'y-M-d 00:00:00'); 

            /* realizar consulta para sumar al valor "cobrado" de remito y diferencia = total - cobrado*/
            /*
            $host = "localhost";
            $basededatos = "sppfla5_prueba";
            $usuariodb = "sppfla5";
            $clavedb = "Sentey@82.";

            //Lista de Tablas si quiero meterlas en una variable y reutilizarlas
            //error_reporting(0); // no muestra errores

            $conexion = new mysqli($host, $usuariodb, $clavedb, $basededatos);


            //$conexion = mysqli_query("SET NAMES 'utf8'");

            if ($conexion ->connect_error) {
                echo "Nuestro sitio experimento fallos...";
                exit();
            }

            $resultados3 = mysqli_query($conexion,"
            SELECT  Total, Cobrado 
            FROM remito             
            WHERE idRemito  = $model->idRemito
            ");

            //muestra y toma de datos en un array
            while ( $row3 = mysqli_fetch_array($resultados3)) 
            {
                
            $total = utf8_encode($row3['Total']);
            $cobrado = utf8_encode($row3['Cobrado']);
            }

            $cobrado = $cobrado + $model->Pago;
            $diferencia = $total - $cobrado;

            $sql = "UPDATE `remito` SET `Cobrado` = $cobrado, `Diferencia` = '$diferencia' WHERE `idRemito ` = $model->idRemito";
      
            if ($conexion->query($sql) === TRUE) {
                echo "";
            } else {
                echo "Error updating record: flash_piezas" . $conexion->error;
            }

            */

            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view',
                        'id' => $model->idPagosRemito
                      ]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'listaremito' => $listaRemito,
        ]);
    }

    /**
     * Updates an existing Pagosremito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listaRemito = ArrayHelper::map(Remito::find()->where(['Estado' => 'Activo'])->all(),'idRemito','Codigo');
        
        if ($model->load(Yii::$app->request->post())) {
            $model->idPagosRemito = $id;  



            /* realizar consulta para sumar al valor "cobrado" de remito y diferencia = total - cobrado*/
            /*
            $host = "localhost";
            $basededatos = "sppfla5_prueba";
            $usuariodb = "sppfla5";
            $clavedb = "Sentey@82.";

            //Lista de Tablas si quiero meterlas en una variable y reutilizarlas
            //error_reporting(0); // no muestra errores

            $conexion = new mysqli($host, $usuariodb, $clavedb, $basededatos);


            //$conexion = mysqli_query("SET NAMES 'utf8'");

            if ($conexion ->connect_error) {
                echo "Nuestro sitio experimento fallos...";
                exit();
            }

            $resultados3 = mysqli_query($conexion,"
            SELECT  Total, Cobrado 
            FROM remito             
            WHERE idRemito  = $model->idRemito
            ");

            //muestra y toma de datos en un array
            while ( $row3 = mysqli_fetch_array($resultados3)) 
            {
                
            $total = utf8_encode($row3['Total']);
            $cobrado = utf8_encode($row3['Cobrado']);
            }

            $cobrado = $cobrado + $model->Pago;
            $diferencia = $total - $cobrado;

            $sql = "UPDATE `remito` SET `Cobrado` = $cobrado, `Diferencia` = '$diferencia' WHERE `idRemito ` = $model->idRemito";
      
            if ($conexion->query($sql) === TRUE) {
                echo "";
            } else {
                echo "Error updating record: flash_piezas" . $conexion->error;
            }

            */







            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view',
                        'id' => $model->idPagosRemito
                      ]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'listaremito' => $listaRemito,
        ]);
    }

    /**
     * Deletes an existing Pagosremito model.
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

        return $this->redirect(['index', 'id' => $model->idPagosRemito]);
    }

    /**
     * Finds the Pagosremito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pagosremito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pagosremito::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
