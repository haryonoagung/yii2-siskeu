<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar GU Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gu-index">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'tanggal_masuk',
            'berkas.no_mak',
            'berkas.nama_berkas',
            'berkas.nominal',
            'status',
            'proses',
            //'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
