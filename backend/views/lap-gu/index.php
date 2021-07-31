<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel common\models\LsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan GU';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ls-index">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Export Excel', ['export-excel'], ['class' => 'btn btn-danger']) ?>
    </p>

    

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'tanggal_masuk',

            [
                'header' => 'Nama Berkas',
                'headerOptions' => ['style' => 'width:300px'],
                'value' => 'berkas.nama_berkas',
            ],

            [
                'header' => 'Nama Bagian',
                'headerOptions' => ['style' => 'width:300px'],
                'value' => 'bagian.nama_bagian',
            ],

            [
                'header' => 'Nominal',
                'headerOptions' => ['style' => 'width:150px'],
                'value' => 'berkas.nominal',
            ],

            [
                'header' => 'No Mak',
                'headerOptions' => ['style' => 'width:150px'],
                'value' => 'berkas.no_mak',
            ],
           
            'status',
            'proses',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
