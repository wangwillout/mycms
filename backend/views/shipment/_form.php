<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Shipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['style' => 'width:200px;']) ?>

    <?= $form->field($model, 'tag')->textInput(['style' => 'width:200px;']) ?>

    <?php
        echo $form->field($model, 'remark')->widget(
            \yii\imperavi\Widget::className(),
            [
                'plugins' => ['fullscreen', 'fontcolor', 'video','image'],
                'options' => [
                    'minHeight' => 400,
                    'maxHeight' => 400,
                    'buttonSource' => true,
                    'convertDivs' => false,
                    'removeEmptyTags' => false,
                    'imageUpload' => Url::to(['upload-imperavi'])
                ]
            ]
        );
    ?>

    <?= $form->field($model, 'status')->radioList(['0'=>'禁用','1'=>'启用']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
