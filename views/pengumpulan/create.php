<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pengumpulan */

$this->title = 'Create Pengumpulan';
$this->params['breadcrumbs'][] = ['label' => 'Pengumpulans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengumpulan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
