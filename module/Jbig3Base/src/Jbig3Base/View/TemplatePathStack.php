<?php

namespace Jbig3Base\View;

use Zend\View\Renderer\PhpRenderer as PhpRendererObj,
    Zend\View\Resolver\AggregateResolver as AggregateResolverObj,
    Zend\View\Resolver\TemplatePathStack as TemplatePathStackObj;

class TemplatePathStack
{
    protected $templatePathStackObj;
    protected $aggregateResolverObj;
    protected $phpRendererObj;

    public function __construct(
        TemplatePathStackObj $templatePathStackObj,
        AggregateResolverObj $aggregateResolverObj,
        PhpRendererObj $phpRendererObj)
    {
        $this->templatePathStackObj = $templatePathStackObj;
        $this->aggregateResolverObj = $aggregateResolverObj;
        $this->phpRendererObj = $phpRendererObj;
    }

    public function addTemplatePathStack(array $paths)
    {
        foreach ($paths as $path) {
            $this->templatePathStackObj->addPath($path);
        }
        $this->aggregateResolverObj->attach($this->templatePathStackObj);
        $this->phpRendererObj->setResolver($this->aggregateResolverObj);
    }
}
