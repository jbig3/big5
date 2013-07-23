<?php

namespace Jbig3Base;

return array(

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Jbig3Base\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'phpInfo' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/phpinfo',
                    'defaults' => array(
                        'controller' => 'Jbig3Base\Controller\PhpInfo',
                        'action'     => 'php-info',
                    ),
                ),
            ),
        )
    ),

    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
    ),

    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => realpath(__DIR__ . '/../language'),
                'pattern'  => '%s.mo',
                'text_domain'  => __NAMESPACE__
            ),
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'Jbig3BaseEntity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Jbig3Base/Entity'
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Jbig3Base\Entity' => 'Jbig3BaseEntity'
                )
            )
        )
    ),

//    'doctrine' => array(
//        'connection' => array(
//            'orm_default' => array(
//                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
//                'params' => array(
//                    'host'     => 'localhost',
//                    'port'     => '3306',
//                    'user'     => 'root',
//                    'password' => 'root',
//                    'dbname'   => 'big5',
//                )
//            )
//        ),
//    ),
);

