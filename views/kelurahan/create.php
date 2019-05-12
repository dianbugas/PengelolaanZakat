<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kelurahan */

$this->title = 'Create Kelurahan';
$this->params['breadcrumbs'][] = ['label' => 'Kelurahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelurahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
