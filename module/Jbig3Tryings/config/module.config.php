<?php
namespace Jbig3Tryings;

return array(

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),

    'router' => array(
        'routes' => array(
            'jbig3Tryings-serviceManager-serviceManager-simple' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/sm/simple',
                    'defaults' => array(
                        'controller' => 'jbig3Tryings-serviceManager-simple-simpleController',
                        'action' => 'index',
                    )
                )
            ),

            'jbig3Tryings-serviceManager-serviceManager-factory' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/sm/factory',
                    'defaults' => array(
                        'controller' => 'jbig3Tryings-serviceManager-factory-factoryControllerFactory',
                        'action' => 'index',
                    )
                )
            ),

            'jbig3Tryings-serviceManager-serviceManager-closure' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/sm/closure',
                    'defaults' => array(
                        'controller' => 'jbig3Tryings-serviceManager-closure-closureController',
                        'action' => 'index',
                    )
                )
            ),

            'jbig3Tryings-serviceManager-serviceManager-initializer' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/sm/initializer',
                    'defaults' => array(
                        'controller' => 'jbig3Tryings-serviceManager-initializer-initializerControllerFactory',
                        'action' => 'index',
                    )
                )
            ),

            'jbig3Tryings-form-standard' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/form/standard',
                    'defaults' => array(
                        'controller' => 'jbig3Tryings-form-FormControllerFactory',
                        'action' => 'register',
                    )
                )
            ),

            'jbig3Tryings-evm-ex01' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/evm/ex01',
                    'defaults' => array(
                        'controller' => 'Ex01EventManagerControllerFactory-ex01-evm-jbig3tryings',
                        'action' => 'index',
                    )
                )
            ),

            'jbig3Tryings-evm-ex02' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/evm/ex02',
                    'defaults' => array(
                        'controller' => 'Ex02EventManagerControllerFactory-ex02-evm-jbig3tryings',
                        'action' => 'index',
                    )
                )
            ),

//            'application' => array(
//                'type'    => 'segment',
//                'options' => array(
//                    'route'    => '[/:controller[/:action]]',
//                    'constraints' => array(
//                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'index',
//                        'action'     => 'index',
//                    ),
//                ),
//            ),

            'jbig3Tryings-evm-ex04' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/evm/ex04',
                    'defaults' => array(
                        'controller' => 'Ex04ControllerFactory-ex04-evm-jbig3tryings',
                        'action' => 'index',
                    )
                )
            ),

            'jbig3Tryings-i18n-translate' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/i18n/translate',
                    'defaults' => array(
                        'controller' => 'i18n',
                        'action' => 'translate',
                    )
                )
            ),

            'jbig3Tryings-i18n-validate' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/i18n/validate',
                    'defaults' => array(
                        'controller' => 'i18n',
                        'action' => 'validate',
                    )
                )
            ),

            'jbig3Tryings-i18n-dateFormatHelper' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/i18n/dateFormat',
                    'defaults' => array(
                        'controller' => 'i18n',
                        'action' => 'date-format-helper',
                    )
                )
            ),

            'jbig3Tryings-i18n-numberFormatHelper' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/i18n/numberFormat',
                    'defaults' => array(
                        'controller' => 'i18n',
                        'action' => 'number-format-helper',
                    )
                )
            ),

            'doctrinetest' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/doctrinetest',
                    'defaults' => array(
                        'controller' => 'DoctrineTestController',
                        'action' => 'doctrineTest',
                    )
                )
            ),
        )
    ),

    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type'         => 'gettext',
                'base_dir'     => realpath(__DIR__ . '/../language'),
                'pattern'      => '%s.mo',
                'text_domain'  => __NAMESPACE__
            ),
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'Jbig3TryingsEntity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Jbig3Tryings/Entity'
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Jbig3Tryings\Entity' => 'Jbig3TryingsEntity'
                )
            )
        )
    ),
);

