<?php
namespace Jbig3Cfm;

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
//                'moduleEntity-jbig3resource' => 'Jbig3Resource\General\Module\ModuleEntity',
            ),
            'factories' => array(
//                'moduleMapper-jbig3resource' => 'Jbig3Resource\General\Module\ModuleMapperFactory',
//                'backendModuleCreateServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Create\ModuleCreateServiceFactory',
//                'backendModuleCreateFormFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Create\ModuleCreateFormFactory',
//                'backendModuleReadServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Read\ModuleReadServiceFactory',
//                'backendModuleUpdateServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Update\ModuleUpdateServiceFactory',
//                'backendModuleUpdateFormFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Update\ModuleUpdateFormFactory',
//                'backendModuleDeleteServiceFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Delete\ModuleDeleteServiceFactory',
            ),
        );
    }

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(),
            'factories' => array(
//                'backendModuleCreateControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Create\ModuleCreateControllerFactory',
//                'backendModuleReadControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Read\ModuleReadControllerFactory',
//                'backendModuleUpdateControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Update\ModuleUpdateControllerFactory',
//                'backendModuleDeleteControllerFactory-jbig3resource' => 'Jbig3Resource\Backend\Module\Delete\ModuleDeleteControllerFactory',
            ),

        );
    }
}