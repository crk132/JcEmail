<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 10:39
 */
/*
 * 初始化与配置一致
 * $entity = new JcEmailEntity(['title'=>'BUG报告','type'=>'测试','content'=>'报告BUG']);
 */
namespace com\JcEmail;
class JcEmailEntity implements JcEmailEntityInterface
{
    protected $_styleName;
    protected $_styleArr;
    protected $_content;

    public function __construct(Array $content , $style = '')
    {
        $styleArr = JcEmailConfig::getStyle($style);
        $this->_styleName = $styleArr['name'];
        $this->_styleArr = $styleArr['content'];
        $this->_content = $content;

    }

    public function getContent()
    {
        $str=file_get_contents(__DIR__.'/style/'.$this->_styleName.'.html');
        $contentArr = [];
        foreach ($this->_styleArr as $item){
            if($this->_content[$item]){
                $contentArr['{$'.$item.'}'] = $this->_content[$item];
            }
        }
        $html = strtr($str,$contentArr);

        // TODO: Implement getContent() method.
        return $html;
    }

}