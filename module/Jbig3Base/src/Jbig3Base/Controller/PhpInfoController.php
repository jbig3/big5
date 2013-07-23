<?php
namespace Jbig3Base\Controller;

use Zend\View\Model\ViewModel;

/**
 * @author Gregory
 * @version 1.0
 * @created 02-Jun-2013 06:43:18
 */
class PhpInfoController extends BaseControllerAbstract
{
    public function phpInfoAction()
    {
        return new ViewModel(array(
                'phpinfo' => phpinfo()
            )
        );
    }
}