<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Brand;
use common\models\ProductCategory;
use common\models\Product;
/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '商品'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app','返回列表'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            ['attribute'=>'category_id','value'=>ProductCategory::findOne($model->category_id)->name],

            'name',

            'sku_id',

            'stock',

            'weight',

            'market_price',

            'price',

            'brief',

            'content',

            'description',

            'thumb',

            'keywords',

            ['attribute' => 'type','value' => Product::getTypeList($model->type)],

            ['attribute' => 'brand_id','value' => Brand::findOne($model->brand_id)->name],

            'star',

            ['attribute' => 'status','value' => $model->status == 0 ? '禁用' : '启用'],

            ['attribute' => 'create_time','value' => !empty($model->create_time) ? date("Y-m-d H:i:s",$model->create_time) : '' ],

            ['attribute' => 'update_time','value' => !empty($model->update_time) ? date("Y-m-d H:i:s",$model->update_time) : '' ],
        ],
    ]) ?>

</div>
