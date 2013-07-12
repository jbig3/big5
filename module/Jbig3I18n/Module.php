<?php
namespace Jbig3I18n;

use Zend\Mvc\MvcEvent,
    Zend\Validator\AbstractValidator;

use Locale;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        Locale::setDefault('de_DE');

        AbstractValidator::setDefaultTranslator(
            $e->getApplication()
                ->getServiceManager()
                ->get('translator')
        );
    }

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
        );
    }
}