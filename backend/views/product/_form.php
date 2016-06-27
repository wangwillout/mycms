<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use trntv\filekit\widget\Upload;
use yii\widgets\ActiveForm;
use common\models\Brand;
use common\models\ProductCategory;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(ProductCategory::getAllCategoryList(0, productCategory::find()->where(['=','display',1])->asArray()->all()), 'id', 'label'), ['prompt'=>'请选择分类'],['style'=>'width:200px;']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sku_id')->textInput() ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'market_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
        echo $form->field($model, 'thumb_file')->widget(
        Upload::className(),
        [
            'url' => ['upload'],
            'maxFileSize' => 50000000, // 5 MiB
        ]);
    ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(['1'=>'新品','2'=>'热销','3'=>'赠品','4'=>'促销','5'=>'团购']) ?>

    <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(Brand::getBrandList(), 'id', 'name'), ['prompt'=>'请选择品牌'],['style'=>'width:200px;']) ?>

    <?= $form->field($model, 'status')->radioList(['0'=>'禁用','1'=>'启用']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
