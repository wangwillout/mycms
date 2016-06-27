<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Role;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '管理员列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '+ 添加'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'account',

            ['attribute' => 'avatar','content' => function($data){
                    return '<img src="'.Yii::$app->fileStorage->baseUrl.'/'.$data->avatar.'" width=50 height=30 />';
                }
            ],

            ['attribute' => 'is_sys','content' => function($data){
                    return $data->is_sys == 0 ? '否' : '是'; 
                }
            ],

            ['attribute' => 'status','content' => function($data){
                    return $data->status == 0 ? '禁用' : '启用';
                }
            ],

            ['attribute' => 'role_id','content' => function($data){
                    return !empty(Role::findOne($data->role_id)) ? Role::findOne($data->role_id)->name : '';
                }
            ],

            ['attribute' => 'create_time','content' => function($data){
                    return date("Y-m-d H:i:s",$data->create_time);
                }
            ],

            ['class' => 'yii\grid\ActionColumn','header' => '操作'],
        ],
    ]); ?>

</div>
