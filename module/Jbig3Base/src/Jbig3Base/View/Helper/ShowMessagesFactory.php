<?php
namespace Jbig3Base\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ShowMessagesFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm     = $serviceLocator->getServiceLocator();
        $plugin = $sm->get('ControllerPluginManager')->get('flashMessenger');

        $helper = new ShowMessages($plugin);

        return $helper;
    }
}
