<?php
namespace Jbig3User\Backend\User\Delete;

use Jbig3User\General\Service\UserService;

class UserDeleteService extends UserService
{

    public function delete($field, $value)
    {
        $this->getMapperObj()->remove($field, $value);
    }

}