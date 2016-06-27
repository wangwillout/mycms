<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Role;
/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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

            'account',

            'avatar',

            'description',

            ['attribute' => 'is_sys','value' => $model->is_sys == 0 ? '否' : '是'],

            ['attribute' => 'status','value' => $model->status == 0 ? '禁用' : '启用'],

            ['attribute' => 'role_id','value' => !empty(Role::findOne($model->role_id)) ? Role::findOne($model->role_id)->name : ''],

            ['attribute' => 'create_time','value' => !empty($model->create_time) ? date("Y-m-d H:i:s",$model->create_time) : ''],

            ['attribute' => 'update_time','value' => !empty($model->update_time) ? date("Y-m-d H:i:s",$model->update_time) : ''],
        ],
    ]) ?>

</div>
