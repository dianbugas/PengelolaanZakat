<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenyaluranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penyaluran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyaluran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php

use dosamigos\highcharts\HighCharts;

   //use miloschuman\highcharts\Highcharts;
   /* @var $this yii\web\View */

   // $this->title = 'Data Pelatihan';

foreach ($dgrafik as $values) {
   $a[0] = ($values['Jenis_Program']);
   $c[] = ($values['Jenis_Program']);
   $b[] = array('type' => 'column', 'name' => $values['Jenis_Program'], 'data' => array((int)$values['Jumlah']));
}
echo
   Highcharts::widget([
   'clientOptions' => [
      'chart' => [
         'type' => 'column'
      ],
      'title' => ['text' => ''],
      'xAxis' => [
         'categories' => ['']
      ],
      'yAxis' => [
         'title' => ['text' => 'Jumlah']
      ],
      'series' => $b
   ]
]);
?>

</div>
