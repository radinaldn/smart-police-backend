<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_laporan') ?>

    <?= $form->field($model, 'id_pelapor') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'lat') ?>

    <?= $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'id_kategori') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
