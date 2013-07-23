<?php

namespace Jbig3User\Backend\User\Delete;

use Zend\Debug\Debug;

use Jbig3User\General\Controller\UserController;

class UserDeleteController extends UserController
{
    const ROUTE_SUCCESS_DELETE = 'admin-user';
    const FIELD = 'id';

    public function deleteAction()
    {
        $value = $this->getEvent()->getRouteMatch()->getParam(self::FIELD);

        if (isset($value)) {
            $this->serviceObj->delete(self::FIELD, $value);
        }

        return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_SUCCESS_DELETE));
    }




}