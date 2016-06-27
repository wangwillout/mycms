<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
/* @var $this yii\web\View */
/* @var $model common\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['style' => 'width:200px;']) ?>

    <?php
        echo $form->field($model, 'logo_file')->widget(
        Upload::className(),
        [
            'url' => ['upload'],
            'maxFileSize' => 50000000, // 5 MiB
        ]);
    ?>

    <?php
        echo $form->field($model, 'description')->widget(
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

    <?= $form->field($model, 'sort')->textInput(['style' => 'width:200px;']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
