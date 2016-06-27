<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */
$parentCategory = ArrayHelper::merge([0 => Yii::t('app', '无')], ArrayHelper::map(ProductCategory::getAllCategoryList(0, productCategory::find()->where(['=','display',1])->asArray()->all()), 'id', 'label'));
unset($parentCategory[$model->id]);
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->dropDownList($parentCategory,['style' => 'width:600px;']) ?>

    <?= $form->field($model, 'name')->textInput(['style' => 'width:300px;']) ?>

    <?= $form->field($model, 'sort')->textInput(['style' => 'width:300px;']) ?>

    <?= $form->field($model, 'display')->radioList(['0'=>'否','1'=>'是']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
