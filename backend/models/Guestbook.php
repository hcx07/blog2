<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "guestbook".
 *
 * @property int $id
 * @property string $username
 * @property int $art_id
 * @property string $content
 * @property string $intime
 * @property int $flag
 */
class Guestbook extends \yii\db\ActiveRecord
{
    public $son;
    public $reply;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guestbook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'flag','parent_id','two_id'], 'integer'],
            [['content'], 'string'],
            ['created_time','default','value'=>time()],
            ['ip','default','value'=>Yii::$app->request->getUserIP()],
            [['username'], 'string', 'max' => 30],
            [['content','username','email'], 'required'],
            [['email'],'match','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/','message'=>'邮箱格式错误，请重新输入'],
            [['url'],'match','pattern'=>'/^(https?|ftp|file):\/\/[-A-Za-z0-9+&@#\/%?=~_|!:,.;]+[-A-Za-z0-9+&@#\/%=~_|]$/','message'=>'地址格式错误,请重新输入'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '名称',
            'article_id' => 'Art ID',
            'content' => '评论',
            'url' => '地址',
            'email' => '邮箱',
            'created_time' => 'Intime',
            'flag' => 'Flag',
            'ip' => 'ip',
        ];
    }
}
