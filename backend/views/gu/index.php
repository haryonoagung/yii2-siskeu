<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BerkasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create GU', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tanggal_masuk',
            
            /*
            [
                'header' => 'Tanggal Masuk',
                'headerOptions' => ['style' => 'width:200px'],
                'value' => function ($model) {
                    return $model->tanggal_masuk;
                }
                
            ],
            
            */

            [
                'header' => 'Nama Berkas',
                'headerOptions' => ['style' => 'width:300px'],
                'value' => 'berkas.nama_berkas',
            ],

            [
                'label' => 'Nama Bagian',
                'headerOptions' => ['style' => 'width:150px'],
                'format' => 'ntext',
                'attribute' => 'id_bagian',
                'format' => 'raw',
                'value' => function($data){
                    $group = $data->bagian;
                    if(!empty($group)){
                        return $group->nama_bagian;
                    }
                    else{
                        return "-";
                    }
                }
            ],

            'status',
            'proses',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
