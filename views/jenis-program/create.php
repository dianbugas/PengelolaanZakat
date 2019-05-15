<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisProgram */

$this->title = 'Create Jenis Program';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
