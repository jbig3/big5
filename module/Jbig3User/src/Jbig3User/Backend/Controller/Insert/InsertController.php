<?php

namespace Jbig3User\Backend\Controller\Insert;

use Zend\Stdlib\ResponseInterface as Response;

use Zend\Debug\Debug;

use Jbig3User\General\Controller\UserController,
    Jbig3User\Module;

class InsertController extends UserController
{
    const ROUTE_INSERT = 'admin-user-insert';
    const ROUTE_SUCCESS_INSERT = 'admin-user';
    const VIEW_VARIABLE = 'insertForm';

    protected $userObjViewVar = 'userObj';

    public function insertAction()
    {

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