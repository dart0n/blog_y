<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required']
        ];
    }

    public function saveComment($post_id)
    {
        $comment = new Comment;
        $comment->text = $this->comment;
        $comment->author_id = Yii::$app->user->id;
        $comment->post_id = $post_id;
        $comment->status = Comment::STATUS_DISALLOW;

        return $comment->save();
    }
}
