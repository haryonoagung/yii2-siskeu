<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Las */

$this->title = 'Update Las: ' . $model->id_ls;
$this->params['breadcrumbs'][] = ['label' => 'Las', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ls, 'url' => ['view', 'id' => $model->id_ls]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="las-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
