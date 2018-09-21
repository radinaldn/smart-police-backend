<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pelapor */

$this->title = 'Create Pelapor';
$this->params['breadcrumbs'][] = ['label' => 'Pelapors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelapor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
