<?php

namespace Jbig3User\Controller\Register;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Stdlib\Hydrator\Reflection as ZendReflection,
    Zend\Crypt\Password\Bcrypt,
    Zend\Stdlib\ResponseInterface as Response,
    Zend\Debug\Debug;
use Jbig3User\Form\Register\RegisterForm,
    Jbig3User\Service\Register\RegisterService,
    Jbig3Base\Controller\BaseController;

class RegisterController extends BaseController
{
    const ROUTE_REGISTER = 'user-register';
    const ROUTE_SUCCESS_REGISTER = 'user-activate-form';
    const VIEW_VARIABLE = 'registerForm';

    protected $registerService;
    protected $textDomain = 'Jbig3User';

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
        $user = $this->registerService->register($post);

        if (!$user) {
            return $this->getViewModel();
        }

        $this->flashMessenger()->addMessage(
            $this->translator->translate(
                'Sich haben sich erfolgreich registriert. Bitte aktivieren Sie jetzt Ihr Konto.', $this->textDomain));

        return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_SUCCESS_REGISTER));
    }

    public function getViewModel()
    {
        return array(
            self::VIEW_VARIABLE => $this->registerService->getForm()
        );
    }

    public function getRegisterService()
    {
        return $this->registerService;
    }

    public function setRegisterService(RegisterService $registerService)
    {
        $this->registerService = $registerService;
        return $this;
    }
}