<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\ProductCategory;
use common\models\Brand;
use common\models\Product;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '商品');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
<?php if(Yii::$app->user->can('/product/create')):?>
    <p>
        <?= Html::a(Yii::t('app', '+ 添加'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'category_id','content' => function($data){
                    return ProductCategory::findOne($data->category_id)->name;
                }
            ],

            'name',

            'sku_id',

            'stock',

            'weight',

            'market_price',

            'price',

            ['attribute' => 'thumb','content' => function($data){
                    return '<img src="'.Yii::$app->fileStorage->baseUrl.'/'.$data->thumb.'" width=50 height=30 />';
                }
            ],

            ['attribute' => 'type','content' => function($data){
                    return Product::getTypeList($data->type);
                }
            ],

            ['attribute' => 'brand_id','content' => function($data){
                    return Brand::findOne($data->brand_id)->name;
                }
            ],

            ['attribute' => 'status','content' => function($data){
                    return $data->status == 0 ? '禁用' : '启用';
                }
            ],

            ['attribute' => 'create_time','content' => function($data){
                    return !empty($data->create_time) ? date("Y-m-d H:i:s",$data->create_time) : '';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
