<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="las-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ls') ?>

    <?= $form->field($model, 'berkas_id_berkas') ?>

    <?= $form->field($model, 'tanggal_masuk') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'proses') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
