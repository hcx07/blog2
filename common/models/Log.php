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

    /**
     * 函数名称: getPhoneNumber
     * 函数功能: 取手机号
     * 输入参数: none
     * 函数返回值: 成功返回号码，失败返回false
     * 其它说明: 说明
     */
    public function getPhoneNumber()
    {
        if (isset($_SERVER['HTTP_X_NETWORK_INFO']))
        {
            $str1 = $_SERVER['HTTP_X_NETWORK_INFO'];
            $getstr1 = preg_replace('/(.*,)(11[d])(,.*)/i','',$str1);
            Return $getstr1;
        }
        elseif (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID']))
        {
            $getstr2 = $_SERVER['HTTP_X_UP_CALLING_LINE_ID'];
            Return $getstr2;
        }
        elseif (isset($_SERVER['HTTP_X_UP_SUBNO']))
        {
            $str3 = $_SERVER['HTTP_X_UP_SUBNO'];
            $getstr3 = preg_replace('/(.*)(11[d])(.*)/i','',$str3);
            Return $getstr3;
        }
        elseif (isset($_SERVER['DEVICEID']))
        {
            Return $_SERVER['DEVICEID'];
        }
        else
        {
            Return false;
        }
    }

    /**
     * 函数名称: getUA
     * 函数功能: 取UA
     * 输入参数: none
     * 函数返回值: 成功返回号码，失败返回false
     * 其它说明: 说明
     */
    protected function getUA()
    {
        if (isset($_SERVER['HTTP_USER_AGENT']))
        {
            Return $_SERVER['HTTP_USER_AGENT'];
        }
        else
        {
            Return false;
        }
    }

    /**
     * 函数名称: getPhoneType
     * 函数功能: 取得手机类型
     * 输入参数: none
     * 函数返回值: 成功返回string，失败返回false
     * 其它说明: 说明
     */
    public function getPhoneType()
    {
        $ua = $this->getUA();
        if($ua!=false)
        {
            $str = explode(' ',$ua);
            Return $str[0];
        }
        else
        {
            Return false;
        }
    }
}
