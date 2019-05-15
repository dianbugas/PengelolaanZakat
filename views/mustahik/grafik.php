<?php

use yii\helpers\Html;
use yii\grid\GridView;
// tambahan namespace yang dibutuhkan
use app\models\Kecamatan;
use app\models\Kelurahan;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $searchModel app\models\MustahikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grafik Mustahik';
$this->params['breadcrumbs'][] = ['label' => 'Mustahiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mustahik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php
 
   use dosamigos\highcharts\HighCharts;

   //use miloschuman\highcharts\Highcharts;
   /* @var $this yii\web\View */

   // $this->title = 'Data Pelatihan';

   foreach($dgrafik as $values){
      $a[0]= ($values['Kecamatan']);
      $c[]= ($values['Kecamatan']);
      $b[]= array('type'=> 'column', 'name' =>$values['Kecamatan'], 'data' => array((int)$values['Jumlah']));
   }
   echo
   Highcharts::widget([
      'clientOptions' => [
         'chart'=>[
            'type'=>'column'
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
