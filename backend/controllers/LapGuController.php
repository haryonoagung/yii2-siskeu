<?php

namespace backend\controllers;

use Yii;
use common\models\Gu;
use common\models\GuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

/**
 * LsController implements the CRUD actions for Ls model.
 */
class LapGuController extends Controller
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
     * Lists all Ls models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = Gu::find();

        
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $pages,
        ]);

        /*
        echo '<pre>';
        print_r ($dataProvider->models);
        die;
        */

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GU model.
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
     * Creates a new GU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gu();

         if ($model->load(Yii::$app->request->post())) {
            $model->tanggal_masuk = date('Y-m-d');
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id_gu]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GU model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_gu]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GU model.
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
     * Finds the Ls model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportExcel()
    {
        $searchModel = new GuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        // Initalize the TBS instance
        $OpenTBS = new \hscstudio\export\OpenTBS; // new instance of TBS
        // Change with Your template kaka
        $template = Yii::getAlias('@hscstudio/export').'/templates/opentbs/laporan-gu.xlsx';
        $OpenTBS->LoadTemplate($template); // Also merge some [onload] automatic fields (depends of the type of document).
        //$OpenTBS->VarRef['modelName']= "Mahasiswa";               
        $data = [];
        $no=1;
        foreach($dataProvider->getModels() as $gus){
            $data[] = [
                'no'=>$no++,
                'tanggal_masuk'=>$gus->tanggal_masuk,
                'berkas'=>$gus->berkas->nama_berkas,
                'bagian'=>$gus->bagian->nama_bagian,
                'nominal'=>$gus->berkas->nominal,
                'no_mak'=>$gus->berkas->no_mak,
                'status'=>$gus->status,
                'proses'=>$gus->proses,
                'keterangan'=>$gus->keterangan,
            ];
        }
        
       
        $OpenTBS->MergeBlock('data', $data);
        //$OpenTBS->MergeBlock('data2', $data2);
        // Output the result as a file on the server. You can change output file
        $OpenTBS->Show(OPENTBS_DOWNLOAD, 'lap-gu.xlsx'); // Also merges all [onshow] automatic fields.          
        exit;
    } 
}
