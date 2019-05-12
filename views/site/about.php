<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About Me';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Foto
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <center><img src="<?= Yii:: $app->request->baseUrl;?>/images/Yusup.jpg" style="width: 200px; border-radius: 150px;"></center>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Data Diri
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <table class="table table-striped">
 		<tr>
 			<td>Nama</td>
 			<td>:</td>
 			<td>Yusup Sopian Ansori</td>
 		</tr>
 		 <tr>
 			<td>TTL</td>
 			<td>:</td>
 			<td>Tasikmalaya, 03 Februari 1997</td>
 		</tr>
 		 <tr>
 			<td>Alamat</td>
 			<td>:</td>
 			<td>Jl. Cilolohan RT02/RW08 Kelurahan Kahuripan Kecamatan Tawang Kota Tasikmalaya</td>
 		</tr>
 		 <tr>
 			<td>Hobi</td>
 			<td>:</td>
 			<td>Membaca, Main PES (Pro Evolution Soccer)</td>
 		</tr>
		</table>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>