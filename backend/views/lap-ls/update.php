<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ls */

$this->title = 'Update Ls: ' . $model->id_ls;
$this->params['breadcrumbs'][] = ['label' => 'Ls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ls, 'url' => ['view', 'id' => $model->id_ls]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ls-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
