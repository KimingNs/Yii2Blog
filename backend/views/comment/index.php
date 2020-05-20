<?php

use common\models\Commentstatus;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'id',
                'contentOptions' => ['width' => '50px'],
            ],
//            'content:ntext',
            [
                'attribute' => 'content',
                'value' => 'beginning',
//                'value' => function ($model) {
//                    $tmpStr = strip_tags($model->content);
//                    $tmpLen = mb_strlen($tmpStr);
//                    return mb_substr($tmpStr, 0, 50, 'utf-8') . (($tmpLen > 30) ? '...' : '');
//                }
            ],
//            'userid',
            [
                'attribute' => 'user.username',
                'value' => 'user.username',
                'label' => '评论用户',
                'contentOptions' => ['width' => '50px'],
            ],
//            'status',
            [
                'attribute' => 'status',
                'value' => 'status0.name',
                'filter' => Commentstatus::find()->select(['name', 'id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column(),
                'contentOptions' =>
                    function ($model) {
                        return ($model->status == 1) ? ['class' => 'bg-danger'] : [];
                    }
            ],
            'create_time:datetime',

            //'email:email',
            //'url:url',
//            'post_id',
            [
                'attribute' => 'post_id',
                'contentOptions' => ['width' => '50px'],
            ],
//            'post.title',
            [
                'attribute' => 'post.title',
                'value' => 'post.title',
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {approve}',
                'buttons' => [
                    'approve' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '审核'),
                            'aria-label' => Yii::t('yii', '审核'),
                            'data-confirm' => Yii::t('yii', '你确定要通过这条评论吗？'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class = "glyphicon glyphicon-check"></span>', $url, $options);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
