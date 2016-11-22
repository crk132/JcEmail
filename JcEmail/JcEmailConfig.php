<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 10:36
 */
namespace com\JcEmail;
class JcEmailConfig{
    protected static $JcEmailConfig=[

        'default_style'=>'normal',
        //主题
        'style'=>[
            'normal'=>[//常规
                'title','type','content'
            ]
        ],
        'smtp'=>[
            'server'=>'smtp.qq.com',
            'serverport'=>'465',
            'usermail'=>'邮箱',
            'user'=>'邮箱',
            'pass'=>'密码',
        ]

    ];

    public static function getSmtp(){
        return self::$JcEmailConfig['smtp'];
    }

    public static function getStyle($style=''){
        if($style==''){
            $content =  self::$JcEmailConfig['style'][self::$JcEmailConfig['default_style']];
            $style = self::$JcEmailConfig['default_style'];
        }
        else if(self::$JcEmailConfig['style'][$style]){
            $content =  self::$JcEmailConfig['style'][$style];
        }else{
            $content =  self::$JcEmailConfig['style'][self::$JcEmailConfig['default_style']];
            $style = self::$JcEmailConfig['default_style'];
        }
        return ['name'=>$style,'content'=>$content];
    }
}
