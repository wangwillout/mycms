<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shipment */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => '邮寄',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '邮寄'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="shipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
