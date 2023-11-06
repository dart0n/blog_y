<?php

namespace app\controllers;

use app\models\CommentForm;
use Yii;
use yii\web\Controller;
use app\models\Post;
use app\models\Tag;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Post::getPaginatedPosts();
        $tags = Tag::getPostsCount();

        return $this->render('index', [
            'posts' => $data['posts'],
            'pagination' => $data['pagination'],
            'tags' => $tags
        ]);
    }

    /**
     * Displays post page.
     *
     * @return string
     */
    public function actionView($id)
    {
        $post = Post::findOne($id);
        $tags = Tag::getPostsCount();
        $commentForm = new CommentForm();

        return $this->render('view', [
            'post' => $post,
            'tags' => $tags,
            'commentForm' => $commentForm
        ]);
    }

    /**
     * Displays posts for one tag.
     *
     * @return string
     */
    public function actionTag($id)
    {
        $data = Post::getPostsForTag($id);
        $tags = Tag::getPostsCount();

        return $this->render('tag', [
            'posts' => $data['posts'],
            'pagination' => $data['pagination'],
            'tags' => $tags
        ]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->saveComment($id)) {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                return $this->redirect(['site/view', 'id' => $id]);
            }
        }
    }
}
