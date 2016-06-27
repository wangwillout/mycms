<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Shipment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '邮寄'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipment-view">

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

            'name',

            'tag',

            'remark',

            ['attribute' => 'status','value' => $model->status == 0 ? '禁用' : '启用'],

            ['attribute' => 'create_time','value' => date("Y-m-d H:i:s",$model->create_time)],

            ['attribute' => 'update_time','value' => date("Y-m-d H:i:s",$model->update_time)],
        ],
    ]) ?>

</div>
