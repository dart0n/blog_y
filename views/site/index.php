<?php

/** @var yii\web\View $this */

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8 mb-3">
                <?= $this->render('_posts', ['posts' => $posts, 'pagination' => $pagination]) ?>
            </div>

            <div class="col-lg-4 mb-3">
                <?= $this->render('_sidebar', ['tags' => $tags]) ?>
            </div>
        </div>
    </div>
</div>
