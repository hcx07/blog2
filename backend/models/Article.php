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
    public $cate_name;
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
            [['update_time'], 'default','value'=>time()],
            [['title'], 'string', 'max' => 50],
            [['author'], 'string', 'max' => 20],
            [['author','title'], 'required'],
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

    public function getCate(){
        return $this->hasOne(Category::className(),['cate_id'=>'cate_id']);
    }
}
