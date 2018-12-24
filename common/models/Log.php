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

    ////获得访客浏览器类型
    public function GetBrowser(){
        if(!empty($_SERVER['HTTP_USER_AGENT']))
        {
            $br = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/MSIE/i',$br)){
                $br = 'MSIE';
            }
            elseif (preg_match('/Firefox/i',$br)){
                $br = 'Firefox';
            }elseif (preg_match('/Chrome/i',$br)){
                $br = 'Chrome';
            }elseif (preg_match('/Safari/i',$br)){
                $br = 'Safari';
            }elseif (preg_match('/Opera/i',$br)){
                $br = 'Opera';
            }else {
                $br = 'Other';
            }
            return "浏览器为".$br;
        }else{
            return "获取浏览器信息失败！";}
    }
    ////获得访客浏览器语言
    public function GetLang()
    {
        if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
            $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $lang = substr($lang,0,5);
            if(preg_match("/zh-cn/i",$lang)){
                $lang = "简体中文";
            }elseif(preg_match("/zh/i",$lang)){
                $lang = "繁体中文";
            }else{
                $lang = "English";
            }
            return "浏览器语言为".$lang;
        }else{
            return "获取浏览器语言失败！";
        }
    }

    //获取客户端操作系统信息包括win10
    public function GetOs(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/win/i', $agent) && strpos($agent, '95'))
        {
            $os = 'Windows 95';
        }
        else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90'))
        {
            $os = 'Windows ME';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent))
        {
            $os = 'Windows 98';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent))
        {
            $os = 'Windows Vista';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent))
        {
            $os = 'Windows 7';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent))
        {
            $os = 'Windows 8';
        }else if(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent))
        {
            $os = 'Windows 10';#添加win10判断
        }else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent))
        {
            $os = 'Windows XP';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent))
        {
            $os = 'Windows 2000';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent))
        {
            $os = 'Windows NT';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent))
        {
            $os = 'Windows 32';
        }
        else if (preg_match('/linux/i', $agent))
        {
            $os = 'Linux';
        }
        else if (preg_match('/unix/i', $agent))
        {
            $os = 'Unix';
        }
        else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent))
        {
            $os = 'SunOS';
        }
        else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent))
        {
            $os = 'IBM OS/2';
        }
        else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent))
        {
            $os = 'Macintosh';
        }
        else if (preg_match('/PowerPC/i', $agent))
        {
            $os = 'PowerPC';
        }
        else if (preg_match('/AIX/i', $agent))
        {
            $os = 'AIX';
        }
        else if (preg_match('/HPUX/i', $agent))
        {
            $os = 'HPUX';
        }
        else if (preg_match('/NetBSD/i', $agent))
        {
            $os = 'NetBSD';
        }
        else if (preg_match('/BSD/i', $agent))
        {
            $os = 'BSD';
        }
        else if (preg_match('/OSF1/i', $agent))
        {
            $os = 'OSF1';
        }
        else if (preg_match('/IRIX/i', $agent))
        {
            $os = 'IRIX';
        }
        else if (preg_match('/FreeBSD/i', $agent))
        {
            $os = 'FreeBSD';
        }
        else if (preg_match('/teleport/i', $agent))
        {
            $os = 'teleport';
        }
        else if (preg_match('/flashget/i', $agent))
        {
            $os = 'flashget';
        }
        else if (preg_match('/webzip/i', $agent))
        {
            $os = 'webzip';
        }
        else if (preg_match('/offline/i', $agent))
        {
            $os = 'offline';
        }
        else if (strpos($agent, 'Android') !== false) {//strpos()定位出第一次出现字符串的位置，这里定位为0
            preg_match("/(?<=Android )[\d\.]{1,}/", $agent, $version);
            $os = 'Platform:Android OS_Version:'.$version[0];
        } elseif (strpos($agent, 'iPhone') !== false) {
            preg_match("/(?<=CPU iPhone OS )[\d\_]{1,}/", $agent, $version);
            $os = 'Platform:iPhone OS_Version:'.str_replace('_', '.', $version[0]);
        } elseif (strpos($agent, 'iPad') !== false) {
            preg_match("/(?<=CPU OS )[\d\_]{1,}/", $agent, $version);
            $os = 'Platform:iPad OS_Version:'.str_replace('_', '.', $version[0]);
        }
        else
        {
            $os = '未知操作系统';
        }
        return "系统为".$os;
    }

}
