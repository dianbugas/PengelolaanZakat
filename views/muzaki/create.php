<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Muzaki */

$this->title = 'Create Muzaki';
$this->params['breadcrumbs'][] = ['label' => 'Muzakis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muzaki-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
