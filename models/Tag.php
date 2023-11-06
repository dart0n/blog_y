<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $title
 *
 * @property PostTag[] $postTags
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(PostTag::className(), ['id' => 'post_id'])
            ->viaTable('post_tag', ['tag_id' => 'id']);
    }

    /**
     * Gets tags with post count.
     *
     * @return array
     */
    public static function getPostsCount()
    {
        return (new \yii\db\Query())
            ->select(['tag.id', 'tag.title', 'COUNT(*) as posts_count'])
            ->from('tag')
            ->innerJoin('post_tag', 'post_tag.tag_id = tag.id')
            ->groupBy('tag.title')
            ->all();
    }
}
