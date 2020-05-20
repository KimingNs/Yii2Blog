<?php

use common\models\Poststatus;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新增文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            ['attribute' => 'id',
                'contentOptions' => ['width' => '50px'],
            ],
            'title',
//            'content:ntext',
//            'author_id',
            ['attribute' => 'authorName',
                'label' => '作者',
                'value' => 'author.nickname',
                'contentOptions' => ['width' => '100px']
            ],
            'tags:ntext',
//            'status',
            ['attribute' => 'status',
                'value' => 'status0.name',
                'filter' => Poststatus::find()->select(['name', 'id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column()
            ],
            //'create_time:datetime',
            'update_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
