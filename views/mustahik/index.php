<?php

use yii\helpers\Html;
use yii\grid\GridView;
// tambahan namespace yang dibutuhkan
use app\models\Kecamatan;
use app\models\Kelurahan;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $searchModel app\models\MustahikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mustahik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mustahik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a('Create Mustahik', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export PDF', ['export-pdf'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Export Excel', ['export-excel'], ['class' => 'btn btn-info']) ?>
        <div style="width:500px; position: relative;">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'nik',
            'nama',
            'jeniskelamin',
            'tempatlahir',
            'tanggallahir',
            [
                'attribute' => 'idkecamatan',
                'value' => 'relKecamatan.nama',
                'filter' => ArrayHelper::Map(Kecamatan::find()->all(), 'id', 'nama')
            ],
            [
                'attribute' => 'idkelurahan',
                'value' => 'relKelurahan.nama',
                'filter' => ArrayHelper::Map(Kelurahan::find()->all(), 'id', 'nama')
            ],
            'alamat',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
