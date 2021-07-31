<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gu */

$this->title = 'Update Gu: ' . $model->id_gu;
$this->params['breadcrumbs'][] = ['label' => 'Gus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gu, 'url' => ['view', 'id' => $model->id_gu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
