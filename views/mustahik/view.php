<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mustahik */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mustahik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mustahik-view">

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

    <div class="row">
        <div class="col-md-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'nik',
                    'nama',
                    'jeniskelamin',
                    'tempatlahir',
                    'tanggallahir',
                    'relKecamatan.nama',
                    'relKelurahan.nama',
                    // 'idkecamatan',
                    // 'idkelurahan',
                    'alamat',
                    'foto',
                ],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?php 
            if (!empty($model->foto)) {
                ?>
                    <img src="<?= yii::$app->request->baseurl; ?>/images/mustahik/<?= $model->foto; ?>" width="80%">
            <?php 
        } else {
            ?>
                    <img src="<?= yii::$app->request->baseurl; ?>/images/nophoto.png" width="80%">
            <?php 
        }
        ?>        
        </div>
    </div>


</div>
