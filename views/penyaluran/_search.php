<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenyaluranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penyaluran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'globalSearch') ?>

    <?php //$form->field($model, 'idmustahik') ?>

    <?php //$form->field($model, 'idjenisprogram') ?>

    <?php //$form->field($model, 'keterangan') ?>

    <!-- <div class="form-group">
        <?php ///Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
