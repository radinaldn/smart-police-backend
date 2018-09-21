<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pelapor')->textInput() ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kategori')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
