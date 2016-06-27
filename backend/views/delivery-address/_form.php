<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Region;
/* @var $this yii\web\View */
/* @var $model common\models\DeliveryAddress */
/* @var $form yii\widgets\ActiveForm */
$country_id = Region::find()->where(['=','parent_id',0])->all();
$province_id = Region::find()->where(['=','parent_id',1])->all();
?>

<div class="delivery-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'member_id')->textInput() ?>

    <?= $form->field($model, 'consignee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map($country_id, 'id', 'name'),['prompt'=>'请选择国家','style'=>'width:200px;']) ?>

    <?= $form->field($model, 'province_id')->dropDownList(ArrayHelper::map($province_id, 'id', 'name'),['prompt'=>'请选择省份','style'=>'width:200px;']) ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'district_id')->textInput() ?>

    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_default')->dropDownList([''=>'请选择','0'=>'否','1'=>'是']) ?>

    <?= $form->field($model, 'is_del')->radioList(['0'=>'否','1'=>'是']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    $(function(){
        $("#deliveryaddress-province_id").change(function(){
            var province_id = $(this).find("option:selected").val();
            $.ajax({
                type:"GET",
                url:"/delivery-address/get-city",
                data:{id:province_id},
                dataType:"json",
                success:function(result){
                    var obj = eval(result);
                    if(obj.result == 1){
                        var city = obj.data;
                        alert(city);
                        var html = '<option index="2" value="" select=""></option>';
                        for(var i = 0;i < city.length; i ++ ){
                            html += '<option index="2" value="'+city[i]['id']+'">'+city[i]['name']+'</option>';
                        }
                        $("#deliveryaddress-city_id").html(html);
                    }
                }
            })
        });
    });
</script>
