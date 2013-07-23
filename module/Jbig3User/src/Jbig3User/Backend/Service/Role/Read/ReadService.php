<?php
namespace Jbig3User\Backend\Service\Role\Read;

use Jbig3User\General\Service\UserService;

class ReadService extends UserService
{

    public function read()
    {
        return $this->getMapperObj()->findAll();
    }
}