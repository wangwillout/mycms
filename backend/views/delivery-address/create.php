<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DeliveryAddress */

$this->title = Yii::t('app', '添加邮寄地址');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '邮寄地址'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
