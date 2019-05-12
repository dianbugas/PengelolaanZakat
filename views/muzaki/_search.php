<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MuzakiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muzaki-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jeniskelamin') ?>

    <?= $form->field($model, 'tempatlahir') ?>

    <?php // echo $form->field($model, 'tanggallahir') ?>

    <?php // echo $form->field($model, 'idkecamatan') ?>

    <?php // echo $form->field($model, 'idkelurahan') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
