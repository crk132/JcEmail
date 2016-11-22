<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 10:27
 */

namespace com\JcEmail;


interface JcEmailInterface
{

    /*
     * 发送邮件接口
     */
    public static function send($toAddress,$title,JcEmailEntityInterface $entity);

}