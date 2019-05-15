<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// tambahan
use app\models\Mustahik;
use app\models\Jenisprogram;
use yii\helpers\ArrayHelper; // untuk menggunakan data array
// gunakan kartik select2 dan datepicker
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Penyaluran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penyaluran-form">

    <?php $form = ActiveForm::begin(); ?>
		
		<?php
        $ar_mustahik = ArrayHelper::map(Mustahik::find()->asArray()->All(), 'id', 'nama');
    ?>
    
    <?php
        echo $form->field($model, 'idmustahik')->widget(Select2::classname(), [
            'data' => $ar_mustahik,
            'language' => 'id',
            'options' => ['placeholder' => '--- Pilih Mustahik ---'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

		<?php
        $ar_jenisprogram = ArrayHelper::map(Jenisprogram::find()->asArray()->All(), 'id', 'nama');
    ?>
    
    <?php
        echo $form->field($model, 'idjenisprogram')->widget(Select2::classname(), [
            'data' => $ar_jenisprogram,
            'language' => 'id',
            'options' => ['placeholder' => '--- Pilih Jenis Program ---'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
