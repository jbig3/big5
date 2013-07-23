<?php

namespace Jbig3User\Backend\Controller\Role\Insert;

use Zend\Stdlib\ResponseInterface as Response;

use Zend\Debug\Debug;

use Jbig3User\General\Controller\UserController,
    Jbig3User\Module;

class RoleInsertController extends UserController
{
    const ROUTE_INSERT = 'admin-role-insert';
    const ROUTE_SUCCESS_INSERT = 'admin-role';
    const VIEW_VARIABLE = 'insertForm';

    public function insertAction()
    {
        // TODO: daraus lässt sich eine generische InsertAction machen

        $redirectUrl = $this->url()->fromRoute(static::ROUTE_INSERT);

        $prg = $this->prg($redirectUrl, true);

        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return $this->getViewModel(self::VIEW_VARIABLE, $this->serviceObj->getFormObj());
        }


        $post = $prg;
        $user = $this->serviceObj->insert($post);

        if (!$user) {
            return $this->getViewModel(self::VIEW_VARIABLE, $this->serviceObj->getFormObj());
        }

        $this->flashMessenger()->addMessage(
            $this->translatorObj->translate(
                'SuccessInsertUser', Module::USER_TEXT_DOMAIN));

        return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_SUCCESS_INSERT));
    }

    public function getViewModel($ViewVariable, $content)
    {
        return array(
            $ViewVariable => $content
        );
    }


}