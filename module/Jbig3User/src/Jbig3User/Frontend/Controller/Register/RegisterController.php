<?php

namespace Jbig3User\Frontend\Controller\Register;

use Zend\Stdlib\Hydrator\Reflection as ZendReflection,
    Zend\Crypt\Password\Bcrypt,
    Zend\Stdlib\ResponseInterface as Response;

use Zend\Debug\Debug;

use Jbig3User\Frontend\Service\Register\RegisterService,
    Jbig3User\General\Controller\UserController,
    Jbig3User\Module;

class RegisterController extends UserController
{
    const ROUTE_REGISTER = 'user-register';
    const ROUTE_SUCCESS_REGISTER = 'user-activate-form';
    const VIEW_VARIABLE = 'registerForm';

    public function registerAction()
    {
        $redirectUrl = $this->url()->fromRoute(static::ROUTE_REGISTER);
        $prg = $this->prg($redirectUrl, true);

        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return $this->getViewModel();
        }

        $post = $prg;
        $user = $this->serviceObj->register($post);

        if (!$user) {
            return $this->getViewModel();
        }

        $this->flashMessenger()->addMessage(
            $this->translatorObj->translate(
                'Sich haben sich erfolgreich registriert. Bitte aktivieren Sie jetzt Ihr Konto.', Module::USER_TEXT_DOMAIN));

        return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_SUCCESS_REGISTER));
    }

    public function getViewModel()
    {
        return array(
            self::VIEW_VARIABLE => $this->serviceObj->getFormObj()
        );
    }
}