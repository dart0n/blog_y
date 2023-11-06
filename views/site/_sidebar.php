<h3>Tags</h3>

<?php

use yii\helpers\Url;

foreach ($tags as $tag) : ?>
    <li>
        <a href="<?= Url::toRoute(['site/tag', 'id' => $tag['id']]) ?>"><?= $tag['title'] ?></a>
        <span class="pull-right">(<?= $tag['posts_count'] ?>)</span>
    </li>
<?php endforeach ?>
