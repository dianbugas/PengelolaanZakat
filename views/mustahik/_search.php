<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MustahikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mustahik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'globalSearch') ?>

    <?php // echo $form->field($model, 'tanggallahir') ?>

    <?php // echo $form->field($model, 'idkecamatan') ?>

    <?php // echo $form->field($model, 'idkelurahan') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php ActiveForm::end(); ?>

</div>
