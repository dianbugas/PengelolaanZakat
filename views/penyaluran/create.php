<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Penyaluran */

$this->title = 'Create Penyaluran';
$this->params['breadcrumbs'][] = ['label' => 'Penyaluran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyaluran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
