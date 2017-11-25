<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property int $cate_id
 * @property string $author
 * @property string $content
 * @property string $intime
 * @property int $views
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_id', 'views'], 'integer'],
            [['content'], 'string'],
            [['intime'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['author'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cate_id' => 'Cate ID',
            'author' => 'Author',
            'content' => 'Content',
            'intime' => 'Intime',
            'views' => 'Views',
        ];
    }
}
