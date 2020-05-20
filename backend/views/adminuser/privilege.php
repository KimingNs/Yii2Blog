<?php

use common\models\Adminuser;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$model = Adminuser::findOne($id);

$this->title = '管理员: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = '权限设置';
?>

<div class="adminuser-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="adminuser-privilege-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= Html::checkboxList('newPri', $AuthAssignmentArray, $allPrivilegesArray); ?>

        <div class="form-group">
            <?= Html::submitButton('设置', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>




