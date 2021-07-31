<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ls */

$this->title = 'Create Ls';
$this->params['breadcrumbs'][] = ['label' => 'Ls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ls-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
