<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DeliveryAddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'member_id')->textInput(['style'=>'width:200px;']) ?>

    <?= $form->field($model, 'consignee')->textInput(['style'=>'width:200px;']) ?>

    <?=$form->field($model, 'mobile')->textInput(['style'=>'width:200px;']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '搜索'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', '重置'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
