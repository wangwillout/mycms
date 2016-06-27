<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'account')->textInput(['style' => 'width:200px;']) ?>

    <?= $form->field($model, 'is_sys')->dropDownList([''=>'全部','0'=>'否','1'=>'是'],['style' => 'width:200px;']) ?>

    <?= $form->field($model, 'status')->dropDownList([''=>'全部','0'=>'禁用','1'=>'启用'],['style' => 'width:200px;']) ?>

    <?=$form->field($model, 'create_time')->widget(common\widgets\datepicker\DatePicker::className(),[
            'options'=>[
                'istime'=>true,
                'readonly'=>true,
                'format'=>'YYYY-MM-DD'
            ]
    ])?>
    <?php 
        echo DateTimePicker::widget([
            'name' => 'create_time',
            'options' => ['placeholder' => '选择到期时间'],
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'yyyy-MM-dd HH:mm:ss ',
                //'startDate' => '01-Mar-2016 12:00 AM',
                'todayHighlight' => true,
                'style' => 'width:200px;'
            ]
        ]);

    ?>

    <?=$form->field($model, 'create_time_end')->widget(common\widgets\datepicker\DatePicker::className(),[
            'options'=>[
                'istime'=>true,
                'readonly'=>true,
                'format'=>'YYYY-MM-DD'
            ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '搜索'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', '重置'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
