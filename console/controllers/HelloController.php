<?php

namespace console\controllers;


use common\models\Post;
use yii\web\Controller;

class HelloController extends Controller
{
    public function actionIndex()
    {
        echo 'hello world! \n';
    }

    public function actionList()
    {
        $post = Post::find()->all();

        foreach ($post as $apost) {
            echo($apost['id'] . '-' . $apost['title'] . "\n");
        }
    }
}