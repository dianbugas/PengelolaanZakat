<?php

use yii\helpers\Html;
use yii\grid\GridView;
// tambahan namespace yang dibutuhkan
use app\models\Mustahik;
use app\models\Jenisprogram;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenyaluranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penyaluran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyaluran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penyaluran', ['create'], ['class' => 'btn btn-success']) ?> 
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
            [
                'attribute' => 'idmustahik',
                'value' => 'relMustahik.nama',
                'filter' => ArrayHelper::Map(Mustahik::find()->all(), 'id', 'nama')
            ],
            [
                'attribute' => 'idjenisprogram',
                'value' => 'relJenisprogram.nama',
                'filter' => ArrayHelper::Map(Jenisprogram::find()->all(), 'id', 'nama')
            ],
            // 'idmustahik',
            // 'idjenisprogram',
            'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
