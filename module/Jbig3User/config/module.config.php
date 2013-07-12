<?php
namespace Jbig3User;

return array(

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
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
                        'controller' => 'registerControllerFactory-jbig3user',
                        'action' => 'register',
                    )
                )
            ),

            'user-activate' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user/activate',
                    'defaults' => array(
                        'controller' => 'activateControllerFactory-jbig3user',
                        'action' => 'activate',
                    )
                )
            ),

            'user-activate-form' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user/activate-form',
                    'defaults' => array(
                        'controller' => 'activateControllerFactory-jbig3user',
                        'action' => 'activate-form',
                    )
                )
            ),

            'user-activate-mail' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user/activate-mail',
                    'defaults' => array(
                        'controller' => 'activateControllerFactory-jbig3user',
                        'action' => 'activate-mail',
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
                    __DIR__ . '/../src/Jbig3User/Entity'
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Jbig3User\Entity' => 'entityDriver-jbig3user'
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

