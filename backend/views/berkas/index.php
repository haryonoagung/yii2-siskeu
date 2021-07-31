<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BerkasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Berkas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Berkas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_berkas',
            'no_mak',
            'nama_berkas',
            'nominal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
