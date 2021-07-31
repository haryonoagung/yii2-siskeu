<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Berkas;
use common\models\Bagian;

/* @var $this yii\web\View */
/* @var $model common\models\Gu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanggal_masuk')->input('date') ?>

    <?= $form->field($model, 'id_berkas')->dropDownList(
        ArrayHelper::map(Berkas::find()->all(), 'id_berkas', 'nama_berkas'),
        ['prompt' => '--Pilih--']
    ) ?>

    <?= $form->field($model, 'id_bagian')->dropDownList(
        ArrayHelper::map(Bagian::find()->all(), 'id_bagian', 'kode_mak'),
        ['prompt' => '--Pilih--']
    ) ?>

    <?= $form->field($model, 'status')->dropDownList([ '-' => '-', 'lengkap' => 'Lengkap', 'tidak lengkap' => 'Tidak lengkap', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'proses')->dropDownList([ '-' => '-', 'KPPN' => 'KPPN', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    
    <?php ActiveForm::end(); ?>

</div>
