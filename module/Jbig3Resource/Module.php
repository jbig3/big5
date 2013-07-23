<?php
namespace Jbig3Resource;

class Module
{
    const TEXT_DOMAIN = __NAMESPACE__;

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
                'moduleEntity-jbig3resource' => 'Jbig3Resource\General\Module\ModuleEntity',
                'controllerEntity-jbig3resource' => 'Jbig3Resource\General\Controller\ControllerEntity',

            ),
            'factories' => array(
                'moduleMapper-jbig3resource' => 'Jbig3Resource\General\Module\ModuleMapperFactory',
                'backendModuleCreateServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Create\ModuleCreateServiceFactory',
                'backendModuleCreateFormFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Create\ModuleCreateFormFactory',
                'backendModuleReadServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Read\ModuleReadServiceFactory',
                'backendModuleUpdateServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Update\ModuleUpdateServiceFactory',
                'backendModuleUpdateFormFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Update\ModuleUpdateFormFactory',
                'backendModuleDeleteServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Delete\ModuleDeleteServiceFactory',

                'controllerMapper-jbig3resource' => 'Jbig3Resource\General\Controller\ControllerMapperFactory',
                'backendControllerCreateServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Create\ControllerCreateServiceFactory',
                'backendControllerCreateFormFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Create\ControllerCreateFormFactory',
                'backendControllerReadServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Read\ControllerReadServiceFactory',
                'backendControllerUpdateServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Update\ControllerUpdateServiceFactory',
                'backendControllerUpdateFormFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Update\ControllerUpdateFormFactory',
                'backendControllerDeleteServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Delete\ControllerDeleteServiceFactory',
//                'generalRoleMapperFactory-jbig3user' => 'Jbig3User\General\Entity\Mapper\RoleMapperFactory',
//                'generalEmailRecordExistsFactory-jbig3user' => 'Jbig3User\General\Form\Validator\EmailRecordExistsFactory',
//                'generalRoleRecordExistsFactory-jbig3user' => 'Jbig3User\General\Form\Validator\RoleRecordExistsFactory',
//                'generalActivateNoRecordExistsFactory-jbig3user' => 'Jbig3User\General\Form\Validator\ActivateNoRecordExistsFactory',
//
//                'frontendActivateFormFactory-jbig3user' => 'Jbig3User\Frontend\Form\Activate\ActivateFormFactory',
//                'frontendActivateFormFilterFactory-jbig3user' => 'Jbig3User\Frontend\Form\Activate\ActivateFormFilterFactory',
//                'frontendRegisterFormFactory-jbig3user' => 'Jbig3User\Frontend\Form\Register\RegisterFormFactory',
//                'frontendRegisterFormFilterFactory-jbig3user' => 'Jbig3User\Frontend\Form\Register\RegisterFormFilterFactory',
//                'frontendActivateServiceFactory-jbig3user' => 'Jbig3User\Frontend\Service\Activate\ActivateServiceFactory',
//                'frontendRegisterServiceFactory-jbig3user' => 'Jbig3User\Frontend\Service\Register\RegisterServiceFactory',
//
//                'backendReadServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Read\ReadServiceFactory',
//                'backendInsertFormFactory-jbig3user' => 'Jbig3User\Backend\Form\Insert\InsertFormFactory',
//                'backendInsertFormFilterFactory-jbig3user' => 'Jbig3User\Backend\Form\Insert\InsertFormFilterFactory',
//                'backendInsertServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Insert\InsertServiceFactory',
//
//                'backendRoleReadServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Role\Read\ReadServiceFactory',
//                'backendRoleInsertFormFactory-jbig3user' => 'Jbig3User\Backend\Form\Role\Insert\InsertFormFactory',
//                'backendRoleInsertFormFilterFactory-jbig3user' => 'Jbig3User\Backend\Form\Role\Insert\InsertFormFilterFactory',
//                'backendRoleInsertServiceFactory-jbig3user' => 'Jbig3User\Backend\Service\Role\Insert\InsertServiceFactory',
//
//                'backendUserUpdateServiceFactory-jbig3user' => 'Jbig3User\Backend\User\Update\Factory\UserUpdateServiceFactory',
//                'backendUserDeleteServiceFactory-jbig3user' => 'Jbig3User\Backend\User\Delete\Factory\UserDeleteServiceFactory',
            ),


        );
    }

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(),
            'factories' => array(
                'backendModuleCreateControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Create\ModuleCreateControllerFactory',
                'backendModuleReadControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Read\ModuleReadControllerFactory',
                'backendModuleUpdateControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Update\ModuleUpdateControllerFactory',
                'backendModuleDeleteControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Delete\ModuleDeleteControllerFactory',

                'backendControllerCreateControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Create\ControllerCreateControllerFactory',
                'backendControllerReadControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Read\ControllerReadControllerFactory',
                'backendControllerUpdateControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Update\ControllerUpdateControllerFactory',
                'backendControllerDeleteControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Controller\Delete\ControllerDeleteControllerFactory',

            ),

        );
    }
}