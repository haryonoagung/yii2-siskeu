<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Las */

$this->title = 'Create Las';
$this->params['breadcrumbs'][] = ['label' => 'Las', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="las-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
