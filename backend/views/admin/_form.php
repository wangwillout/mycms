<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'account')->textInput(['style' => 'width:200px;']) ?>
<?php if($this->context->action->id == 'create'){?>
    <?= $form->field($model, 'password')->passwordInput(['style' => 'width:200px;']) ?>
<?php }?>
    <?php
        echo $form->field($model, 'avatar_file')->widget(
        Upload::className(),
        [
            'url' => ['upload'],
            'maxFileSize' => 50000000, // 5 MiB
        ]);
    ?>

    <?= $form->field($model, 'is_sys')->dropDownList(['0'=>'否','1'=>'是'],['style' => 'width:200px;']) ?>

    <?= $form->field($model, 'status')->radioList(['0'=>'禁用','1'=>'启用']) ?>

    <?= $form->field($model, 'role_id')->dropDownList(yii\helpers\ArrayHelper::map(\common\models\Admin::getRoleList(), 'id', 'name'), ['prompt'=>'请选择角色']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
