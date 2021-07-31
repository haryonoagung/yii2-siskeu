<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profil */

$this->title = 'Update Profil: ' . $model->id_profil;
$this->params['breadcrumbs'][] = ['label' => 'Profils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_profil, 'url' => ['view', 'id' => $model->id_profil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
