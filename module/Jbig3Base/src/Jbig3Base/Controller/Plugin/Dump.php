<?php
namespace Jbig3Base\Controller\Plugin;

use Zend\Debug\Debug;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Dump extends AbstractPlugin
{

    public function __invoke($data = null, $echo = true)
    {
        return Debug::dump($data, null, $echo);
    }
}
