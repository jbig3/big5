<?php
namespace Jbig3User\Backend\User\Update\Factory;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\User\Update\UserUpdateFormFilter;

class UserUpdateFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        // TODO: wird so auch nicht gehen - kein weiterer, ausser dieser Eintrag
        // siehe dazu Doctrine Handbuch
        $emailRecordExistsValidator = $sm->get('generalEmailRecordExistsFactory-jbig3user');

        $srv = new UserUpdateFormFilter($emailRecordExistsValidator, null);

        return $srv;
    }


}