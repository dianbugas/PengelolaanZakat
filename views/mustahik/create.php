<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mustahik */

$this->title = 'Create Mustahik';
$this->params['breadcrumbs'][] = ['label' => 'Mustahik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mustahik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
