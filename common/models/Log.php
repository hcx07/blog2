<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property string $id
 * @property string $intro 操作
 * @property int $user_id
 * @property string $url
 * @property string $ip
 * @property int $created_time
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_time'], 'integer'],
            [['intro', 'url', 'ip','username'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'intro' => '操作',
            'user_id' => 'User ID',
            'url' => 'Url',
            'ip' => 'Ip',
            'created_time' => 'Created Time',
        ];
    }

    /**
     * @param $data
     * @return bool
     * @throws \Exception
     * 添加数据
     */
    public function addLog($intro){
        $user=Yii::$app->user->getIdentity();
        $this->user_id=$user->id;
        $this->username=$user->username;
        $this->intro=$intro;
        $this->url=Yii::$app->request->getAbsoluteUrl();
        $this->ip=Yii::$app->request->getUserIP();
        $this->created_time=time();
        $result = $this->save();
        if(!$result){
            throw new \Exception("日志添加失败");
        }
        return $result;
    }
}
