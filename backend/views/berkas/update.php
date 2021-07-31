<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Berkas */

$this->title = 'Update Berkas: ' . $model->id_berkas;
$this->params['breadcrumbs'][] = ['label' => 'Berkas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_berkas, 'url' => ['view', 'id' => $model->id_berkas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berkas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
