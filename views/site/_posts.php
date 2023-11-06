<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<?php foreach ($posts as $post) : ?>
    <div>
        <img src="<?= $post->getImage(); ?>" alt="" height="300">

        <h2><?= $post->title ?></h2>

        <p><?= $post->description ?></p>

        <p>Created: <?= $post->getFormattedDate() ?></p>

        <p>
            <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['site/view', 'id' => $post->id]) ?>">Read more &raquo;</a>
        </p>
    </div>
<?php endforeach; ?>

<?php echo LinkPager::widget(['pagination' => $pagination]); ?>
