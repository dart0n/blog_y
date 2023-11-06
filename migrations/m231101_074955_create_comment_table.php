<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m231101_074955_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'author_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
        ]);

        $this->createIndex(
            'idx-comment-author_id',
            'comment',
            'author_id'
        );

        $this->addForeignKey(
            'fk-comment-author_id',
            'comment',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-comment-post_id',
            'comment',
            'post_id'
        );

        $this->addForeignKey(
            'fk-comment-post_id',
            'comment',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-comment-author_id',
            'comment'
        );

        $this->dropForeignKey(
            'fk-comment-author_id',
            'comment'
        );

        $this->dropIndex(
            'idx-comment-post_id',
            'comment'
        );

        $this->dropForeignKey(
            'fk-comment-post_id',
            'comment'
        );
        $this->dropTable('comment');
    }
}
