<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelapor */

$this->title = 'Update Pelapor: ' . $model->id_pelapor;
$this->params['breadcrumbs'][] = ['label' => 'Pelapors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelapor, 'url' => ['view', 'id' => $model->id_pelapor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelapor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
