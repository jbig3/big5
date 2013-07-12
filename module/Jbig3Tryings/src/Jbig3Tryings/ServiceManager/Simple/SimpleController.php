<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Jbig3Tryings\ServiceManager\Simple;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SimpleController extends AbstractActionController
{
    public function indexAction()
    {
        $greetingSrv = $this->getServiceLocator()
            ->get('jbig3-greating-plugin');

        return new ViewModel(
            array('greeting' => $greetingSrv->getGreeting())
        );
    }
}
