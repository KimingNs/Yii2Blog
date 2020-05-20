<?php

use common\models\Adminuser;
use common\models\Poststatus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
    //    第一种：
    //    $psObjs = Poststatus::find()->all();
    //    $allStatus = ArrayHelper::map($psObjs,'id','name');

    //    第二种：
    //    $allStatus = (new Query())->select(['name','id'])
    //    ->from('poststatus')
    //    ->indexBy('id')->column();
    //
    //    第三种：
    //    $allStatus = Poststatus::find()->select(['name','id'])
    //    ->orderBy('position')
    //    ->indexBy('id')->column();
    ?>

    <?= $form->field($model, 'status')
        ->dropDownList(Poststatus::find()->select(['name', 'id'])
            ->orderBy('position')
            ->indexBy('id')->column(),
            ['prompt' => '请选择状态']); ?>


    <?= $form->field($model, 'author_id')
        ->dropDownList(Adminuser::find()->select(['nickname', 'id'])
            ->indexBy('id')->column(),
            ['prompt' => '请选择作者']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
