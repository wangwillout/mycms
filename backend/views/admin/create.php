<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = Yii::t('app', '创建管理员');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '管理员'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
