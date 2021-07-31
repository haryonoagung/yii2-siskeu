<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Berkas */

$this->title = 'Daftar Berkas';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Berkas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
