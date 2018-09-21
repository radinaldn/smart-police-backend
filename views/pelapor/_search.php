<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PelaporSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelapor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pelapor') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jk') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
