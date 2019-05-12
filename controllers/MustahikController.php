<?php

namespace app\controllers;

use Yii;
use app\models\Mustahik;
use app\models\MustahikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// tambahan
use yii\web\UploadedFile;


/**
 * MustahikController implements the CRUD actions for Mustahik model.
 */
class MustahikController extends Controller
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
     * Lists all Mustahik models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MustahikSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGrafik()
    {
        $data = Yii::$app->db->createCommand('SELECT kecamatan.nama AS Kecamatan, COUNT(*) AS Jumlah FROM mustahik INNER JOIN kecamatan ON mustahik.idkecamatan=kecamatan.id GROUP BY kecamatan.nama')->queryAll();

        return $this->render('grafik', [
            'dgrafik' => $data
        ]);
    }

    /**
     * Displays a single Mustahik model.
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
     * Creates a new Mustahik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mustahik();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //menambahkan method u/ upload dokumen
            $model->fotoFile = UploadedFile::getInstance($model, 'fotoFile');
            //cek apakah ada file yg diupload / tidak, dan lolos validasi
            if ($model->validate() && !empty($model->fotoFile)) {
                //$nama = $model->nip.'.jpg';
                //$nama = $model->fotoFile->baseName.'.'.$model->fotoFile->extension;
                $nama = $model->nik . '.' . $model->fotoFile->extension;
                $model->foto = $nama; //menyimpan nama file
                $model->save(); //data lain juga simpan ke db
                //simpan fisik foto di folder images
                $model->fotoFile->saveAs('images/mustahik/' . $nama);
            } else {
                $model->save();//simpan data tanpa foto
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mustahik model.
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
     * Deletes an existing Mustahik model.
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
     * Finds the Mustahik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mustahik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mustahik::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportPdf()
    {
        $searchModel = new MustahikSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $html = $this->renderPartial('pdfMustahik', ['dataProvider' => $dataProvider]);
        $mpdf = new \mPDF('c', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    public function actionExportExcel()
    {
        $searchModel = new MustahikSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        // Initalize the TBS instance
        $OpenTBS = new \hscstudio\export\OpenTBS; // new instance of TBS
        // Change with Your template kaka
        $template = Yii::getAlias('@hscstudio/export') . '/templates/opentbs/excelMustahik.xlsx';
        $OpenTBS->LoadTemplate($template); // Also merge some [onload] automatic fields (depends of the type of document).
        //$OpenTBS->VarRef['modelName']= "Mahasiswa";               
        $data = [];
        $no = 1;
        foreach ($dataProvider->getModels() as $mustahik) {
            $data[] = [
                'no' => $no++,
                'nik' => $mustahik->nik,
                'nama' => $mustahik->nama,
                'jeniskelamin' => $mustahik->jeniskelamin,
                'tempatlahir' => $mustahik->tempatlahir,
                'tanggallahir' => $mustahik->tanggallahir,
                'kecamatan' => $mustahik->relKecamatan->nama,
                'kelurahan' => $mustahik->relKelurahan->nama,
                'alamat' => $mustahik->alamat,

            ];
        }



        $OpenTBS->MergeBlock('data', $data);
        // Output the result as a file on the server. You can change output file
        $OpenTBS->Show(OPENTBS_DOWNLOAD, 'dataMustahik-' . date('j-m-Y-H:i:s') . '.xlsx'); // Also merges all [onshow] automatic fields.          
        exit;
    }
}
