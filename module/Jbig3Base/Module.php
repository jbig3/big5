<?php


namespace Jbig3Base;
use Zend\Mvc\ModuleRouteListener,
    Zend\Mvc\MvcEvent,
    Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ControllerProviderInterface,
    Zend\ModuleManager\Feature\ServiceProviderInterface,
    Zend\Validator\AbstractValidator;

use Locale;


/**
 * @author Gregory
 * @version 1.0
 * @created 02-Jun-2013 06:43:18
 */
class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ControllerProviderInterface,
    ServiceProviderInterface
{

    // TODO: herausfinden, was es tut!
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'jbig3-em' => 'doctrine.entitymanager.orm_default',
            ),
            'invokables' => array(
                'hydrator-jbig3base' => 'Zend\Stdlib\Hydrator\ClassMethods',
                'bcrypt-jbig3base' => 'Zend\Crypt\Password\Bcrypt',
                'zendTemplatePathStack-jbig3base' => 'Zend\View\Resolver\TemplatePathStack',
                'zendViewModel-jbig3base' => 'Zend\View\Model\ViewModel',
                'zendPhpRenderer-jbig3base' => 'Zend\View\Renderer\PhpRenderer',
                'zendAggregateResolver-jbig3base' => 'Zend\View\Resolver\AggregateResolver',

            ),
            'factories' => array(
                'templatePathStack-jbig3base' => 'Jbig3Base\View\TemplatePathStackFactory',
            ),
            'initializers' => array(),
            'abstract_factories' => array(
                'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
                'Zend\Log\LoggerAbstractServiceFactory',
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'dateHelper' => 'Jbig3Base\View\Helper\Date',
                'showForm' => 'Jbig3Base\View\Helper\ShowForm',
                'yesNo' => 'Jbig3Base\View\Helper\YesNo',
            ),
            'factories' => array(
                'showMessages' => 'Jbig3Base\View\Helper\ShowMessagesFactory',
            ),
        );
    }

    public function getControllerPluginConfig()
    {
        return array(
            'invokables' => array(
                'dump' => 'Jbig3Base\Controller\Plugin\Dump',
            )
        );
    }

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(
                'Jbig3Base\Controller\Index' => 'Jbig3Base\Controller\IndexController',
                'Jbig3Base\Controller\PhpInfo' => 'Jbig3Base\Controller\PhpInfoController'
            )
        );
    }

}