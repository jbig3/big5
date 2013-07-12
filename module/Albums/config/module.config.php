<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Albums\Controller\Albums' => 'Albums\Controller\AlbumsController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'albums' => array(
                'type'    => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/albums[/:action][/:id]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Albums\Controller',
                        'controller'    => 'Albums',
                        'action'        => 'index',
                    ),
					'constraints' => array(
						'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'		 => '[0-9]+',
					),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Albums' => __DIR__ . '/../view',
        ),
    ),
);
