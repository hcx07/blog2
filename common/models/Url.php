<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property string $url_id
 * @property string $src
 * @property string $name
 * @property int $status 0 正常 1删除
 * @property int $created_time
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_time'], 'integer'],
            [['src', 'name','intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'url_id' => 'Url ID',
            'src' => 'Src',
            'name' => 'Name',
            'status' => '0 正常 1删除',
            'created_time' => 'Created Time',
            'intro' => 'intro',
        ];
    }
}
