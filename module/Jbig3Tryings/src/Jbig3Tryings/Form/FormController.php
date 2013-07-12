<?php

namespace Jbig3Tryings\Form;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Stdlib\Hydrator\Reflection as ZendReflection;
use Jbig3Tryings\Form\RegisterForm as Jbig3RegisterForm,
    Jbig3User\Entity\UserEntity as Jbig3UserEntity;

class FormController extends AbstractActionController
{
    protected $registerForm;
    protected $hydrator;
    protected $userEntity;

    public function registerAction()
    {
        $this->registerForm->setHydrator($this->hydrator);
        $this->registerForm->bind($this->userEntity);

        if ($this->getRequest()->isPost()) {
            $this->registerForm->setData($this->getRequest()->getPost());
            if ($this->registerForm->isValid()) {

                $this->em = $this
                    ->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager');

                $this->em->persist($this->userEntity);
                $this->em->flush();

                return $this->redirect()->toRoute('jbig3Tryings-form-standard');

            } else {
                return new ViewModel(
                    array(
                        'form' => $this->registerForm
                    )
                );
            }
        } else {
            return new ViewModel(
                array(
                    'form' => $this->registerForm
                )
            );
        }
    }

    public function setRegisterForm(Jbig3RegisterForm $registerForm)
    {
        $this->registerForm = $registerForm;
    }

    public function setHydrator(ZendReflection $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    public function setUserEntity(Jbig3UserEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    }


}