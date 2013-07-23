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

            'crud-solo-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/solo/create',
                    'defaults' => array(
                        'controller' => 'CrudSoloController',
                        'action' => 'create',
                    )
                )
            ),

            'crud-solo-read' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/solo',
                    'defaults' => array(
                        'controller' => 'CrudSoloController',
                        'action' => 'read',
                    )
                )
            ),

            'crud-solo-update' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/try/crud/solo/update/:id',
                    'defaults' => array(
                        'controller' => 'CrudSoloController',
                        'action' => 'update',
                        'id' => ''
                    )
                )
            ),

            'crud-solo-delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/try/crud/solo/delete/:id',
                    'defaults' => array(
                        'controller' => 'CrudSoloController',
                        'action' => 'delete',
                        'id' => ''
                    )
                )
            ),

            'crud-otm-collection-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/otm/collection/create',
                    'defaults' => array(
                        'controller' => 'CrudOtmCollectionController',
                        'action' => 'create',
                    )
                )
            ),

            'crud-otm-collection-read' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/otm/collection',
                    'defaults' => array(
                        'controller' => 'CrudOtmCollectionController',
                        'action' => 'read',
                    )
                )
            ),

            'crud-otm-collection-update' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/try/crud/otm/collection/update/:id',
                    'defaults' => array(
                        'controller' => 'CrudOtmCollectionController',
                        'action' => 'update',
                        'id' => '',
                    )
                )
            ),

            'crud-otm-collection-delete-user' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/try/crud/otm/collection/delete/:id',
                    'defaults' => array(
                        'controller' => 'CrudOtmCollectionController',
                        'action' => 'delete-user',
                        'id' => '',
                    )
                )
            ),

            'crud-otm-collection-delete-user-address' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/try/crud/otm/collection/delete/address/:id',
                    'defaults' => array(
                        'controller' => 'CrudOtmCollectionController',
                        'action' => 'delete-user-address',
                        'id' => '',
                    )
                )
            ),

            'crud-otm-object-select-controller-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/otm/os/create',
                    'defaults' => array(
                        'controller' => 'CrudOtmObjectSelectController',
                        'action' => 'create-controller',
                    )
                )
            ),

            'crud-mtm-role-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/mtm/role/create',
                    'defaults' => array(
                        'controller' => 'CrudMtmController',
                        'action' => 'create-role',
                    )
                )
            ),

            'crud-mtm-role-read' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/mtm/role',
                    'defaults' => array(
                        'controller' => 'CrudMtmController',
                        'action' => 'read-role',
                    )
                )
            ),

            'crud-mtm-role-update' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/try/crud/mtm/role/update/:id',
                    'defaults' => array(
                        'controller' => 'CrudMtmController',
                        'action' => 'update-role',
                        'id' => '',
                    )
                )
            ),

            'crud-mtm-role-delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/try/crud/mtm/role/delete/:id',
                    'defaults' => array(
                        'controller' => 'CrudMtmController',
                        'action' => 'delete-role',
                        'id' => '',
                    )
                )
            ),

            'crud-mtm-user-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/try/crud/mtm/user/create',
                    'defaults' => array(
                        'controller' => 'CrudMtmController',
                        'action' => 'create-user',
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
                    __DIR__ . '/../src/Jbig3Tryings/Entity',
                    __DIR__ . '/../src/Jbig3Tryings/Crud/Solo',
                    __DIR__ . '/../src/Jbig3Tryings/Crud/OneToMany/Collection',
                    __DIR__ . '/../src/Jbig3Tryings/Crud/OneToMany/ObjectSelect',
                    __DIR__ . '/../src/Jbig3Tryings/Crud/ManyToMany',
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Jbig3Tryings\Entity' => 'Jbig3TryingsEntity',
                    'Jbig3Tryings\Crud\Solo' => 'Jbig3TryingsEntity',
                    'Jbig3Tryings\Crud\OneToMany\Collection' => 'Jbig3TryingsEntity',
                    'Jbig3Tryings\Crud\OneToMany\ObjectSelect' => 'Jbig3TryingsEntity',
                    'Jbig3Tryings\Crud\ManyToMany' => 'Jbig3TryingsEntity',
                )
            )
        )
    ),
);

