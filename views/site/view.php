<?php

/** @var yii\web\View $this */

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8 mb-3">
                <div>
                    <img src="<?= $post->getImage(); ?>" alt="" height="300">

                    <h2><?= $post->title ?></h2>

                    <p><?= $post->content ?></p>

                    <p>Created: <?= $post->getFormattedDate() ?></p>
                </div>

                <?= $this->render('_comments', [
                    'post' => $post,
                    'comments' => $post->comments,
                    'commentForm' => $commentForm
                ]) ?>
            </div>

            <div class="col-lg-4 mb-3">
                <?= $this->render('_sidebar', ['tags' => $tags]) ?>
            </div>
        </div>
    </div>
</div>
