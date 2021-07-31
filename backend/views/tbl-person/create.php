<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPerson */

$this->title = 'Create Tbl Person';
$this->params['breadcrumbs'][] = ['label' => 'Tbl People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
