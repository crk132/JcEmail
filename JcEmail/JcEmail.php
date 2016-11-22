<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 10:37
 */

namespace com\JcEmail;




class JcEmail implements JcEmailInterface
{

    public static function send($toAddress,$title, JcEmailEntityInterface $entity)
    {
        // TODO: Implement send() method.
        return self::sendSmtp($toAddress,$title,$entity->getContent());

    }

    protected static function sendSmtp($toAddress,$title,$html){

        $config = JcEmailConfig::getSmtp();

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = $config['server'];
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = $config['serverport'];
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        //Username to use for SMTP authentication
        $mail->Username = $config['usermail'];
        //Password to use for SMTP authentication
        $mail->Password = $config['pass'];
        //Set who the message is to be sent from
        $mail->setFrom($config['usermail'], 'john');
        //Set an alternative reply-to address
        $mail->addReplyTo($config['usermail'], 'john');
        //Set who the message is to be sent to
        $mail->addAddress($toAddress, 'John Doe');
        //Set the subject line
        $mail->Subject = $title;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($html);
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        //       $mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }

    }
}