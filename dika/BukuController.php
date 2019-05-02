<?php

namespace app\controllers;

use Yii;
use app\models\Buku;
use app\models\BukuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//tambahan
use yii\web\UploadedFile;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends Controller
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
     * Lists all Buku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
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
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    /*  
    public function actionCreate()
    {
        $model = new Buku();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    */

    public function actionCreate()
    {
        $model = new Buku();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //proses upload file
            $model->coverFile = UploadedFile::getInstance($model, 'coverFile');
            if ($model->validate() && !empty($model->coverFile)) 
            {
                $nama = $model->isbn.'.'.$model->coverFile->extension;
                $model->cover = $nama;
                $model->save();
                $model->coverFile->saveAs('images/buku/'.$nama);
            } 
            else {
                $model->save();
            }


            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //SEBELUM UPDATE HAPUS FOTO LAMA
            unlink('images/buku/'.$model->cover);

            //-----proses awal upload file-------------
            $model->coverFile = UploadedFile::getInstance($model, 'coverFile');
            if($model->validate() && !empty($model->coverFile))
            {
                $nama = $model->isbn.'.'.$model->coverFile->extension;
                $model->cover = $nama;
                $model->save();
                $model->coverFile->saveAs('images/buku/'.$nama);
            }    
            else{
                $model->save();
            }
            //--------proses akhir upload file-----------
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Buku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();

        $model = $this->findModel($id);
        unlink('images/buku/'.$model->cover);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buku::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportPdf()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $html = $this->renderPartial('_pdf',['dataProvider'=>$dataProvider]);
        $mpdf=new \mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);  
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    public function actionExportExcel()
    {

        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $OpenTBS = new \hscstudio\export\OpenTBS;

        $template = Yii::getAlias('@hscstudio/export').'/templates/opentbs/dataBuku.xlsx';
        $OpenTBS->LoadTemplate($template);

        $data = [];
        $no=1;
        foreach ($dataProvider->getModels() as $buku) {
            $data[] = [
                'no'=>$no++,
                'isbn'=>$buku->isbn,
                'judul'=>$buku->judul,
                'tahun'=>$buku->tahun_cetak,
                'stok'=>$buku->stok,
                'pengarang'=>$buku->pengarang->nama,
                'penerbit'=>$buku->penerbit->nama,
                ];
        }
        $OpenTBS->MergeBlock('data', $data);

        $OpenTBS->Show(OPENTBS_DOWNLOAD, 'dataBukuKita.xlsx');
        exit;

    }


}
