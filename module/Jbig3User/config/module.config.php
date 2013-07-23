<?php
namespace Jbig3User;

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
            'user-register' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user/register',
                    'defaults' => array(
                        'controller' => 'frontendRegisterControllerFactory-jbig3user',
                        'action' => 'register',
                    )
                )
            ),

            'user-activate-form' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user/activate-form',
                    'defaults' => array(
                        'controller' => 'frontendActivateControllerFactory-jbig3user',
                        'action' => 'activate-form',
                    )
                )
            ),

            'user-activate-mail' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user/activate-mail',
                    'defaults' => array(
                        'controller' => 'FrontendActivateControllerFactory-jbig3user',
                        'action' => 'activate-mail',
                    )
                )
            ),

            'admin-user' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/user',
                    'defaults' => array(
                        'controller' => 'backendReadControllerFactory-jbig3user',
                        'action' => 'read',
                    )
                )
            ),

            'admin-user-insert' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/user/insert',
                    'defaults' => array(
                        'controller' => 'backendInsertControllerFactory-jbig3user',
                        'action' => 'insert',
                    )
                )
            ),

            'admin-user-update' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/user/update/:id',
                    'defaults' => array(
                        'controller' => 'backendUserUpdateControllerFactory-jbig3user',
                        'action' => 'update',
                        'id' => ''
                    )
                )
            ),

            'admin-user-delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/user/delete/:id',
                    'defaults' => array(
                        'controller' => 'backendUserDeleteControllerFactory-jbig3user',
                        'action' => 'delete',
                        'id' => ''
                    )
                )
            ),

            'admin-role' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/role',
                    'defaults' => array(
                        'controller' => 'backendRoleReadControllerFactory-jbig3user',
                        'action' => 'read',
                    )
                )
            ),

            'admin-role-insert' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin/role/insert',
                    'defaults' => array(
                        'controller' => 'backendRoleInsertControllerFactory-jbig3user',
                        'action' => 'insert',
                    )
                )
            ),
        )
    ),

    'doctrine' => array(
        'driver' => array(
            'entityDriver-jbig3user' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Jbig3User/General/Entity'
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Jbig3User\General\Entity' => 'entityDriver-jbig3user'
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

