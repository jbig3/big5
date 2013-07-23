<?php

namespace Jbig3User\Backend\Controller\Read;

use Zend\Debug\Debug;

use Jbig3User\General\Controller\UserController;

class ReadController extends UserController
{
    protected $userObjViewVar = 'userObj';

    public function readAction()
    {
        $userObj = $this->serviceObj->read();

        $viewModel = $this->getViewModel($this->userObjViewVar, $userObj);
        return $viewModel;
    }

    public function getViewModel($ViewVariable, $content)
    {
        return array(
            $ViewVariable => $content
        );
    }


}