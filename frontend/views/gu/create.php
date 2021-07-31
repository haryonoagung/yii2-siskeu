<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gu */

$this->title = 'Create Gu';
$this->params['breadcrumbs'][] = ['label' => 'Gus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
