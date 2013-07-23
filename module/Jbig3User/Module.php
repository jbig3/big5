<?php
namespace Jbig3User;

class Module
{
    const TEXT_DOMAIN = 'Jbig3User';

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
                'generalUserEntity-jbig3user' => 'Jbig3User\General\Entity\UserEntity',
                'generalRoleEntity-jbig3user' => 'Jbig3User\General\Entity\RoleEntity',
                'generalRuleEntity-jbig3user' => 'Jbig3User\General\Entity\RuleEntity',
            ),
            'factories' => array(
                'generalUserMapperFactory-jbig3user' => 'Jbig3User\General\Entity\Mapper\UserMapperFactory',
                'generalRoleMapperFactory-jbig3user' => 'Jbig3User\General\Entity\Mapper\RoleMapperFactory',
                'generalEmailRecordExistsFactory-jbig3user' => 'Jbig3User\General\Form\Validator\EmailRecordExistsFactory',
                'generalRoleRecordExistsFactory-jbig3user' => 'Jbig3User\General\Form\Validator\RoleRecordExistsFactory',
                'generalActivateNoRecordExistsFactory-jbig3user' => 'Jbig3User\General\Form\Validator\ActivateNoRecordExistsFactory',

                'frontendActivateFormFactory-jbig3user' => 'Jbig3User\Frontend\Form\Activate\ActivateFormFactory',
                'frontendActivateFormFilterFactory-jbig3user' => 'Jbig3User\Frontend\Form\Activate\ActivateFormFilterFactory',
                'frontendRegisterFormFactory-jbig3user' => 'Jbig3User\Frontend\Form\Register\RegisterFormFactory',
                'frontendRegisterFormFilterFactory-jbig3user' => 'Jbig3User\Frontend\Form\Register\RegisterFormFilterFactory',
                'frontendActivateServiceFactory-jbig3user' => 'Jbig3User\Frontend\Service\Activate\ActivateServiceFactory',
                'frontendRegisterServiceFactory-jbig3user' => 'Jbig3User\Frontend\Service\Register\RegisterServiceFactory',

                'backendReadServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Read\ReadServiceFactory',
                'backendInsertFormFactory-jbig3user' => 'Jbig3User\Backend\Form\Insert\InsertFormFactory',
                'backendInsertFormFilterFactory-jbig3user' => 'Jbig3User\Backend\Form\Insert\InsertFormFilterFactory',
                'backendInsertServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Insert\InsertServiceFactory',

                'backendRoleReadServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Role\Read\ReadServiceFactory',
                'backendRoleInsertFormFactory-jbig3user' => 'Jbig3User\Backend\Form\Role\Insert\InsertFormFactory',
                'backendRoleInsertFormFilterFactory-jbig3user' => 'Jbig3User\Backend\Form\Role\Insert\InsertFormFilterFactory',
                'backendRoleInsertServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Role\Insert\InsertServiceFactory',

                'backendUserUpdateServiceFactory-jbig3user' => 'Jbig3User\Backend\User\Update\Factory\UserUpdateServiceFactory',
                'backendUserDeleteServiceFactory-jbig3user' => 'Jbig3User\Backend\User\Delete\Factory\UserDeleteServiceFactory',
            ),


        );
    }

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(),
            'factories' => array(
                'frontendActivateControllerFactory-jbig3user' => 'Jbig3User\Frontend\Controller\Activate\ActivateControllerFactory',
                'frontendRegisterControllerFactory-jbig3user' => 'Jbig3User\Frontend\Controller\Register\RegisterControllerFactory',

                'backendUserUpdateControllerFactory-jbig3user' => 'Jbig3User\Backend\User\Update\Factory\UserUpdateControllerFactory',
                'backendUserDeleteControllerFactory-jbig3user' => 'Jbig3User\Backend\User\Delete\Factory\UserDeleteControllerFactory',



                'backendReadControllerFactory-jbig3user' => 'Jbig3User\Backend\Controller\Read\ReadControllerFactory',
                'backendInsertControllerFactory-jbig3user' => 'Jbig3User\Backend\Controller\Insert\InsertControllerFactory',

                'backendRoleReadControllerFactory-jbig3user' => 'Jbig3User\Backend\Controller\Role\Read\RoleReadControllerFactory',
                'backendRoleInsertControllerFactory-jbig3user' => 'Jbig3User\Backend\Controller\Role\Insert\RoleInsertControllerFactory',

            ),

        );
    }
}