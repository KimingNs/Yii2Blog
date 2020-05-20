<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class RctReplyWidget extends Widget
{
    public $recentComments;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $commentString = '';

        foreach ($this->recentComments as $comment) {
            $commentString .= '<div class="post">' .
                '<div class="title">' .
                '<p style="color:#777777;font-style:italic;">' .
                nl2br($comment->content) . '</p>' .
                '<p class="text"> <span class="glyphicon glyphicon-user" aria-hidden="ture">
							</span> ' . Html::encode($comment->user->username) . '</p>' .

                '<p style="font-size:8pt;color:bule" class="glyphicon glyphicon-book">
							《<a href="' . $comment->post->url . '">' . Html::encode($comment->post->title) . '</a>》</p>' .

                '<p class="time"> <span class="glyphicon glyphicon-time" aria-hidden="ture">
							</span> ' . Html::encode(date('Y-m-d H:i:s', $comment->create_time)) . '</p>' .
                '<hr></div></div>';
        }
        return $commentString;
    }
}