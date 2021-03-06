<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ShipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '邮寄');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php if(Yii::$app->user->can('/shipment/create')):?>
    <p>
        <?= Html::a(Yii::t('app', '+ 添加'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            'tag',

            ['attribute' => 'status','content' => function($data){
                    return $data->status == 0 ? '禁用' : '启用';
                }
            ],

            ['attribute' => 'create_time','content' => function($data){
                    return date("Y-m-d H:i:s",$data->create_time);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
