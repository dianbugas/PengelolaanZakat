<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penyaluran */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penyaluran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyaluran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'relMustahik.nama',
            'relJenisprogram.nama',
            // 'idmustahik',
            // 'idjenisprogram',
            'keterangan',
        ],
    ]) ?>

</div>
