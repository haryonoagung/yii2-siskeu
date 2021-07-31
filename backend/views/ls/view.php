<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ls */

$this->title = $model->tanggal_masuk."--".$model->berkas2->nama_berkas;;
$this->params['breadcrumbs'][] = ['label' => 'Ls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ls-view">

    <?php for ($i=0; $i < 3 ; $i++) { 
        echo"</br>";
    }
    ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ls], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ls], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'berkas2.nama_berkas',
            'bagian2.nama_bagian',
            'tanggal_masuk',
            'status',
            'proses',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
