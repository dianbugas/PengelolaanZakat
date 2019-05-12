<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// tambahan
use app\models\Kecamatan;
use app\models\Kelurahan;
use yii\helpers\ArrayHelper; // untuk menggunakan data array
// gunakan kartik select2 dan datepicker
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Mustahik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mustahik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jeniskelamin')->radioList(['Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tempatlahir')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'tanggallahir')->widget(DatePicker::classname(), [
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Tanggal Lahir'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ],
    ]);
    ?>

    <?php
    $ar_kecamatan = ArrayHelper::map(Kecamatan::find()->asArray()->All(), 'id', 'nama');
    ?>
    
    <?php
    echo $form->field($model, 'idkecamatan')->widget(Select2::classname(), [
        'data' => $ar_kecamatan,
        'language' => 'id',
        'options' => ['placeholder' => '--- Pilih Kecamatan ---'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $ar_kelurahan = ArrayHelper::map(Kelurahan::find()->asArray()->All(), 'id', 'nama');
    ?>
    
    <?php
    echo $form->field($model, 'idkelurahan')->widget(Select2::classname(), [
        'data' => $ar_kelurahan,
        'language' => 'id',
        'options' => ['placeholder' => '--- Pilih Kelurahan ---'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fotoFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
