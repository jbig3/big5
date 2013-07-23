<?php

namespace Jbig3User\Backend\Controller\Role\Read;

use Zend\Debug\Debug;

use Jbig3User\General\Controller\UserController;

class RoleReadController extends UserController
{
    protected $roleObjViewVar = 'roleObj';

    public function readAction()
    {
        $roleObj = $this->serviceObj->read();

        $viewModel = $this->getViewModel($this->roleObjViewVar, $roleObj);
        return $viewModel;
    }

    // TODO: in BaseController
    public function getViewModel($ViewVariable, $content)
    {
        return array(
            $ViewVariable => $content
        );
    }


}