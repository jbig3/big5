<?php
namespace Jbig3User\Backend\User\Update;

use Jbig3User\General\Service\UserService;

class UserUpdateService extends UserService
{

    public function update($field, $value)
    {
        $this->getMapperObj()->update($field, $value);
    }

}