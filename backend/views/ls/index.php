<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\LsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ls-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ls', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'tanggal_masuk',

            [
                'label' => 'Nama Berkas',
                'headerOptions' => ['style' => 'width:150px'],
                'format' => 'ntext',
                'attribute' => 'id_berkas',
                'format' => 'raw',
                'value' => function($data){
                    $group = $data->berkas2;
                    if(!empty($group)){
                        return $group->nama_berkas;
                    }
                    else{
                        return "-";
                    }
                }
            ],

            [
                'label' => 'Nama Bagian',
                'headerOptions' => ['style' => 'width:150px'],
                'format' => 'ntext',
                'attribute' => 'id_bagian',
                'format' => 'raw',
                'value' => function($data){
                    $group = $data->bagian2;
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
