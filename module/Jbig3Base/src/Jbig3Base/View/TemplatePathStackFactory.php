<?php
namespace Jbig3Base\View;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Base\View\TemplatePathStack;

class TemplatePathStackFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $zendTemplatePathStackObj = $sm->get('zendTemplatePathStack-jbig3base');
        $zendAggregateResolverObj = $sm->get('zendAggregateResolver-jbig3base');
        $zendPhpRendererObj = $sm->get('zendPhpRenderer-jbig3base');

        $srv =  new TemplatePathStack($zendTemplatePathStackObj, $zendAggregateResolverObj, $zendPhpRendererObj);

        return $srv;
    }


}