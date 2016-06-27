<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Shipment */

$this->title = Yii::t('app', '添加邮寄');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '邮寄'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
