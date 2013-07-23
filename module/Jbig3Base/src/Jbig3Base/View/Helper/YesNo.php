<?php
namespace Jbig3Base\View\Helper;

use Zend\View\Helper\AbstractHelper;

class yesNo extends AbstractHelper
{
    const IS_YES = 'ja';
    const IS_NO = 'nein';

    public function __invoke($value)
    {
        if($value){
            return self::IS_YES;
        }else{
            return self::IS_NO;
        }

//
//
//        return $this->getView()->dateFormat($dateTime, $dateType, $timeType);
    }
}
