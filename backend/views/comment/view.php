<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = '评论内容：' . $model->content;
$this->params['breadcrumbs'][] = ['label' => '评论管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '评论信息';
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑评论', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除评论', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除此条评论吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
//            'status',
            [
                'attribute' => 'status',
                'value' => $model->status0->name,
            ],
            'create_time:datetime',
//            'userid',
            [
                'attribute' => 'userid',
                'value' => $model->user->username,
            ],
            'email:email',
            'url:url',
            'post_id',
            [
                'attribute' => 'post.title',
                'value' => $model->post->title,
            ],
        ],
    ]) ?>

</div>
