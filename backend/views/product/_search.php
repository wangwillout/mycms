<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::merge(['' => Yii::t('app', '全部')],ArrayHelper::map(ProductCategory::getAllCategoryList(0, productCategory::find()->where(['=','display',1])->asArray()->all()), 'id', 'label')),['style'=>'width:200px;']) ?>

    <?= $form->field($model, 'name')->textInput(['style'=>'width:200px;']) ?>

    <?= $form->field($model, 'type')->dropDownList([''=>'全部','1'=>'新品','2'=>'热销','3'=>'赠品','4'=>'促销','5'=>'团购'],['style'=>'width:200px;']) ?>

    <?= $form->field($model, 'status')->dropDownList([''=>'全部','0'=>'禁用','1'=>'启用'],['style'=>'width:200px;']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '搜索'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', '重置'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
