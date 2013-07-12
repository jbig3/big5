<?php
namespace Jbig3Tryings\Form;

use \Zend\ServiceManager\FactoryInterface,
//    \Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;
use Jbig3Tryings\Form\FormController as Jbig3TryingsFormController;

class FormControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $ctr = new Jbig3TryingsFormController;

        $ctr->setRegisterForm($sm->getServiceLocator()->get('jbig3-form-registerFormFactory'));
        $ctr->setHydrator($sm->getServiceLocator()->get('jbig3-hydrator'));
        $ctr->setUserEntity($sm->getServiceLocator()->get('jbig3-userEntity'));

        return $ctr;
    }
}