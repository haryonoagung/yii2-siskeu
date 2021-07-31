<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\LsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan LS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ls-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'tanggal_masuk',

            [
                'header' => 'Nama Berkas',
                'headerOptions' => ['style' => 'width:150px'],
                'value' => 'berkas2.nama_berkas',
            ],

            [
                'header' => 'Nominal',
                'headerOptions' => ['style' => 'width:150px'],
                'value' => 'berkas2.nominal',
            ],

            [
                'header' => 'No Mak',
                'headerOptions' => ['style' => 'width:150px'],
                'value' => 'berkas2.no_mak',
            ],
           
            [
                'label' => 'Nama Bagian',
                'headerOptions' => ['style' => 'width:150px'],
                'format' => 'ntext',
                'attribute' => 'bagian2.nama_bagian',
                'format' => 'raw',

                /*
                'value' => function($data){
                    $group = $data->bagian2;
                    if(!empty($group)){
                        return $group->nama_bagian;
                    }
                    else{
                        return "-";
                    }
                }
                */
            ],


            /*
           [ 'attribute' => 'id_bagian', 
             'label' => 'Nama Bagian',
             'format' => 'raw',
             'value' => function ($data){
             //return Html::label($data['nama_bagian']);
             }
            ],
            */

            'status',
            'proses',
            'keterangan:ntext',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
