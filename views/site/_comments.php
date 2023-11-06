<?php

use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <h4>Leave a comment</h4>

        <?php if (Yii::$app->session->getFlash('comment')) : ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment') ?>
            </div>
        <?php endif ?>

        <?php $form = ActiveForm::begin([
            'action' => ['site/comment', 'id' => $post->id],
            'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']
        ]) ?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($commentForm, 'comment')->textarea(['class' => 'form-control', 'placeholder' => 'Write Message'])->label(false) ?>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Save Comment</button>
        <?php ActiveForm::end(); ?>
    <?php endif ?>

    <?php if (!empty($post->comments)) : ?>
        <div class="mt-4">
            <h5 class="mb-3">Comments</h5>

            <?php foreach ($comments as $comment) : ?>
                <div class="mt-2 p-2 border rounded">
                    <div class="mb-3 d-flex justify-content-between">
                        <h5><?= $comment->author->username; ?></h5>
                        <span>
                            <?= $comment->getFormattedDate(); ?>
                        </span>
                    </div>

                    <p><?= $comment->text; ?></p>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>
