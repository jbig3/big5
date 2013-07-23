<?php
namespace Jbig3User\Backend\User\Update\Factory;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\User\Update\UserUpdateForm;

class UserUpdateFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'update';
        $translator = $sm->get('translator');
        // TODO: wir dos nicht funktionieren - id fehlt!
        $action = '/user/update';
        $inputFilter = $sm->get('backendUserUpdateFormFilterFactory-jbig3user');

        $srv = new UserUpdateForm($name, $translator, $action, $inputFilter);

        return $srv;
    }


}