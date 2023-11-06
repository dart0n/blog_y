<?php

namespace app\modules\admin\controllers;

use app\models\Comment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CommentController extends Controller
{
    /**
     * Lists all Comment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $comments = Comment::find()->orderBy('id desc')->all();

        return $this->render('index', ['comments' => $comments]);
    }

    public function actionAllow($id)
    {
        $comment = Comment::findOne($id);

        if ($comment->allow()) {
            return $this->redirect(['index']);
        }
    }

    public function actionDisallow($id)
    {
        $comment = Comment::findOne($id);

        if ($comment->disallow()) {
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Comment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);

        if ($comment->delete()) {
            return $this->redirect(['comment/index']);
        }
    }
}
