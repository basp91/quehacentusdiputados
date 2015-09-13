<?php

namespace app\controllers;

use app\models\VotacionCiudadana;
use Yii;
use app\models\Iniciativa;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IniciativaController implements the CRUD actions for Iniciativa model.
 */
class IniciativaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Iniciativa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Iniciativa::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Iniciativa model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => VotacionCiudadana::find()->where(['iniciativa_id' => $model->id])->andWhere(['!=','comentario',''])
        ]);
        $votacion_ciudadana = new VotacionCiudadana();

        if(!Yii::$app->user->isGuest){
            if ($votacion_ciudadana->usuarioVoto(Yii::$app->user->id, $model->id)){
                $votacion_ciudadana = VotacionCiudadana::find()->where(['iniciativa_id' => $model->id, 'user_id' => Yii::$app->user->id])->one();
            } else{
                $votacion_ciudadana->user_id = Yii::$app->user->identity->getId();
                $votacion_ciudadana->iniciativa_id = $model->id;
            }
        }

        if ($votacion_ciudadana->load(Yii::$app->request->post()) && $votacion_ciudadana->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', [
                'model' => $model,
                'vot_ciud' => $votacion_ciudadana,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Creates a new Iniciativa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Iniciativa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Iniciativa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Iniciativa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Iniciativa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Iniciativa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Iniciativa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
