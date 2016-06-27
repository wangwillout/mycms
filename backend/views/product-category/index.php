<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '商品分类');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php if(Yii::$app->user->can('/product-category/create')):?>
    <p>
        <?= Html::a(Yii::t('app', '+ 添加分类'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            'pid',

            'name',

            ['attribute' => 'display','content' => function($data){
                    return $data->display == 0 ? '否' : '是';
                }
            ],

            'sort',

            ['attribute' => 'create_time','content' => function($data){
                    return !empty($data->create_time) ? date("Y-m-d H:i:s",$data->create_time) : '';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
