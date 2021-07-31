<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BagianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Bagian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bagian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_bagian',
            'kode_mak',
            'nama_bagian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
