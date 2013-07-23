<?php
namespace Jbig3Resource;

return array(

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view/frontend',
            __DIR__ . '/../view/backend',
        )
    ),

    'email' => array(
        "template_path_stack" => array(
            realpath(__DIR__ . "/../view/email/")
        ),
    ),

    'router' => array(
        'routes' => array(
            'backend-resource-module-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/module/create',
                    'defaults' => array(
                        'controller' => 'backendModuleCreateControllerFactory-jbig3resource',
                        'action' => 'create',
                    )
                )
            ),

            'backend-resource-module-read' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/module',
                    'defaults' => array(
                        'controller' => 'backendModuleReadControllerFactory-jbig3resource',
                        'action' => 'read',
                    )
                )
            ),

            'backend-resource-module-update' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/module/update/:id',
                    'defaults' => array(
                        'controller' => 'backendModuleUpdateControllerFactory-jbig3resource',
                        'action' => 'update',
                        'id' => ''
                    )
                )
            ),

            'backend-resource-module-delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/module/delete/:id',
                    'defaults' => array(
                        'controller' => 'backendModuleDeleteControllerFactory-jbig3resource',
                        'action' => 'delete',
                        'id' => ''
                    )
                )
            ),

            'backend-resource-controller-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/controller/create',
                    'defaults' => array(
                        'controller' => 'backendControllerCreateControllerFactory-jbig3resource',
                        'action' => 'create',
                    )
                )
            ),

            'backend-resource-controller-read' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/controller',
                    'defaults' => array(
                        'controller' => 'backendControllerReadControllerFactory-jbig3resource',
                        'action' => 'read',
                    )
                )
            ),

            'backend-resource-controller-update' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/controller/update/:id',
                    'defaults' => array(
                        'controller' => 'backendControllerUpdateControllerFactory-jbig3resource',
                        'action' => 'update',
                        'id' => ''
                    )
                )
            ),

            'backend-resource-controller-delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/controller/delete/:id',
                    'defaults' => array(
                        'controller' => 'backendControllerDeleteControllerFactory-jbig3resource',
                        'action' => 'delete',
                        'id' => ''
                    )
                )
            ),
        )
    ),

    'doctrine' => array(
        'driver' => array(
            'entityDriver-jbig3Resource' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Jbig3Resource/General/Module',
                    __DIR__ . '/../src/Jbig3Resource/General/Controller',
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Jbig3Resource\General\Module' => 'entityDriver-jbig3Resource',
                    'Jbig3Resource\General\Controller' => 'entityDriver-jbig3Resource'
                )
            )
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
);

