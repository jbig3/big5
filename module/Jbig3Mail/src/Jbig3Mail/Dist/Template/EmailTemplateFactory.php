<?php
namespace Jbig3Mail\Template;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Mail\Template\EmailTemplate;

class EmailTemplateFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $mailTemplateConfigObj = $sm->get('mailTemplateConfigObj');
        $templatePathStackObj = $sm->get('templatePathStack-jbig3base');
        $aggregateResolverObj = $sm->get('aggregateResolver-jbig3base');
        $viewModelObj = $sm->get('viewModel-jbig3base');
        $phpRendererObj = $sm->get('phpRenderer-jbig3base');

        $srv =  new EmailTemplate();

        $srv->setMailTemplateConfigObj($mailTemplateConfigObj);
        $srv->setTemplatePathStackObj($templatePathStackObj);
        $srv->setAggregateResolverObj($aggregateResolverObj);
        $srv->setViewModelObj($viewModelObj);
        $srv->setPhpRendererObj($phpRendererObj);

        return $srv;
    }


}