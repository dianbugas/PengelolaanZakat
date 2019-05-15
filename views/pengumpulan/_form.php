<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengumpulan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengumpulan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idmuzaki')->textInput() ?>

    <?= $form->field($model, 'idupz')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
