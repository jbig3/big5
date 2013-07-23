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
//            'backend-resource-module-create' => array(
//                'type' => 'Zend\Mvc\Router\Http\Literal',
//                'options' => array(
//                    'route' => '/admin/module/create',
//                    'defaults' => array(
//                        'controller' => 'backendModuleCreateControllerFactory-jbig3resource',
//                        'action' => 'create',
//                    )
//                )
//            ),
        )
    ),

    'doctrine' => array(
        'driver' => array(
            'entityDriver-jbig3Resource' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Jbig3Resource/General',
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Jbig3Resource\General' => 'entityDriver-jbig3Resource',
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

