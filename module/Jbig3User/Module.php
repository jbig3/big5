<?php
namespace Jbig3User;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
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

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(),
            'invokables' => array(
                'userEntity-jbig3user' => 'Jbig3User\Entity\UserEntity',
            ),
            'factories' => array(
                'userMapperFactory-jbig3user' => 'Jbig3User\Entity\Mapper\UserMapperFactory',

                'emailRecordExistsFactory-jbig3user' => 'Jbig3User\Form\Validator\EmailRecordExistsFactory',
                'activateNoRecordExistsFactory-jbig3user' => 'Jbig3User\Form\Validator\ActivateNoRecordExistsFactory',

                'registerFormFactory-jbig3user' => 'Jbig3User\Form\Register\RegisterFormFactory',
                'registerFormFilterFactory-jbig3user' => 'Jbig3User\Form\Register\RegisterFormFilterFactory',
                'activateFormFactory-jbig3user' => 'Jbig3User\Form\Activate\ActivateFormFactory',
                'activateFormFilterFactory-jbig3user' => 'Jbig3User\Form\Activate\ActivateFormFilterFactory',

                'registerServiceFactory-jbig3user' => 'Jbig3User\Service\Register\RegisterServiceFactory',
                'activateServiceFactory-jbig3user' => 'Jbig3User\Service\Activate\ActivateServiceFactory',
            ),


        );
    }

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(),
            'factories' => array(
                'registerControllerFactory-jbig3user' => 'Jbig3User\Controller\Register\RegisterControllerFactory',
                'activateControllerFactory-jbig3user' => 'Jbig3User\Controller\Activate\ActivateControllerFactory',
            ),

        );
    }
}