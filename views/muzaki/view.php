<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Muzaki */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Muzakis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muzaki-view">

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
            'nik',
            'nama',
            'jeniskelamin',
            'tempatlahir',
            'tanggallahir',
            'idkecamatan',
            'idkelurahan',
            'alamat',
            'foto',
        ],
    ]) ?>

</div>
