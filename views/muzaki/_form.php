<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Muzaki */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muzaki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jeniskelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempatlahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggallahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idkecamatan')->textInput() ?>

    <?= $form->field($model, 'idkelurahan')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
