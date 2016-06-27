<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '品牌列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
<?php if(Yii::$app->user->can('/brand/create')):?>
    <p>
        <?= Html::a(Yii::t('app', '+ 添加品牌'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            ['attribute' => 'logo','content' => function($data){
                    return '<img src="'.Yii::$app->fileStorage->baseUrl.'/'.$data->logo.'" width=50 height=30 />';
                }
            ],

            ['attribute' => 'status','content' => function($data){
                    return $data->status == 0 ? '禁用' : '启用';
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
