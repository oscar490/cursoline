<?php

namespace app\controllers;

use Yii;
use app\models\Modulos;
use app\models\ModulosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Matriculaciones;
use app\models\MatriculacionForm;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
/**
 * ModelosController implements the CRUD actions for Modulos model.
 */
class ModulosController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['@'],
                        // 'matchCallback' => function ($rule, $action) {
                        //
                        //     $usuario_logueado = Yii::$app->user->identity;
                        //     return $usuario_logueado->getEstaMatriculado(Yii::$app->request->get('id'));
                        // }
                    ],
                ],
            ]
        ];
    }

    /**
     * Lists all Modulos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModulosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modulos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model =  $this->findModel($id);

        $unidades = new ActiveDataProvider([
            'query' => $model->getUnidades(),
            'pagination' => false,
        ]);

        return $this->render('view', [
            'model' => $model,
            'unidades' => $unidades,
        ]);
    }

    public function actionRenderContent($id)
    {
        $model = $this->findModel($id);

        $unidades = new ActiveDataProvider([
            'query' => $model->getUnidades(),
            'pagination' => false,
        ]);

        return $this->renderAjax('view', [
            'model' => $model,
            'unidades' => $unidades,
        ]);
    }

    public function actionMatricular($id)
    {
        $model = new MatriculacionForm([
            'id_modulo' => $id,
        ]);

        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $matriculacion = new Matriculaciones([
                'usuario_id' => Yii::$app->user->id,
                'modulo_id' => $id,
            ]);
            $matriculacion->save();
            // return $this->redirect(['modulos/view', 'id' => $id]);
        }

        return $model->errors;


    }

    /**
     * Creates a new Modulos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Modulos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Modulos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Modulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Modulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modulos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
