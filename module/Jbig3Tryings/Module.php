<?php
namespace Jbig3Tryings;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ControllerProviderInterface,
    Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ControllerProviderInterface,
    ServiceProviderInterface
{

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
            'invokables' => array(
                'greating-plugin-jbig3tryings' => 'Jbig3Tryings\ServiceManager\Plugin\GreetingPlugin',
                'PizzaSalami' => 'Jbig3Tryings\ServiceManager\Initializer\PizzaSalami',
                'WheatFlour' => 'Jbig3Tryings\ServiceManager\Initializer\WheatFlour',
                'loggingTask-task-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Task\LoggingTask',
                'listenerEventTask-ex04-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example04\Task\ListenerEventTask',

            ),
            'factories' => array(
                'TriggerFactory-ex01-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example01\TriggerFactory',
                'SharedTriggerFactory-ex02-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example02\SharedTriggerFactory',
                'TriggerServiceFactory-ex04-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example04\Service\TriggerServiceFactory',
                'exampleListenerFactory-ex04-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example04\Listener\ExampleListenerFactory',
            ),
            'initializers' => array(
                'pizzaSalami-initializer' => 'Jbig3Tryings\ServiceManager\Initializer\PizzaSalamiInitializer',
            )
        );
    }

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(
                'jbig3Tryings-serviceManager-simple-simpleController'
                => 'Jbig3Tryings\ServiceManager\Simple\SimpleController',
                'jbig3Tryings-serviceManager-initializer-initializerController'
                => 'Jbig3Tryings\ServiceManager\Initializer\InitializerController',
                'listing' => 'Jbig3Tryings\EventManager\Example03\Controller\ListingController',
                'i18n' => 'Jbig3Tryings\I18n\Controller\I18nController',
                'DoctrineTestController' => 'Jbig3Tryings\Doctrine\DoctrineTestController',
                'CrudSoloController' => 'Jbig3Tryings\Crud\Solo\CrudSoloController',
                'CrudOtmCollectionController' => 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionController',
                'CrudOtmObjectSelectController' => 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectController',
                'CrudMtmController' => 'Jbig3Tryings\Crud\ManyToMany\CrudMtmController',
            ),
            'factories' => array(
                'jbig3Tryings-serviceManager-factory-factoryControllerFactory'
                => 'Jbig3Tryings\ServiceManager\Factory\FactoryControllerFactory',
                'jbig3Tryings-serviceManager-closure-closureController' => function ($serviceLocator) {
                    $ctr = new \Jbig3Tryings\ServiceManager\Closure\ClosureController();
                    $ctr->setGreetingService(
                        $serviceLocator->getServiceLocator()
                            ->get('jbig3-greating-plugin')
                    );
                    return $ctr;
                },
                'jbig3Tryings-serviceManager-initializer-initializerControllerFactory'
                => 'Jbig3Tryings\ServiceManager\Initializer\InitializerControllerFactory',
                'jbig3Tryings-form-formControllerFactory' => 'Jbig3Tryings\Form\FormControllerFactory',
                'Ex01EventManagerControllerFactory-ex01-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example01\Ex01EventManagerControllerFactory',
                'Ex02EventManagerControllerFactory-ex02-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example02\Ex02EventManagerControllerFactory',
                'Ex04ControllerFactory-ex04-evm-jbig3tryings' => 'Jbig3Tryings\EventManager\Example04\Controller\Ex04ControllerFactory',

            ),
        );
    }


}