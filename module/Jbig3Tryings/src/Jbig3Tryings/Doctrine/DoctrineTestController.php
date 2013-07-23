<?php
namespace Jbig3Tryings\Doctrine;
use Zend\View\Model\ViewModel;

use Jbig3Base\Controller\BaseControllerAbstract;


/**
 * @author Gregory
 * @version 1.0
 * @created 02-Jun-2013 06:43:18
 */
class DoctrineTestController extends BaseControllerAbstract
{
    // TODO: implementieren

    public function doctrineTestAction()
    {
        // Translater aus SM holen

//        echo $this->translate('Testausgabe aus doctrineTestAction');

        $em = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');

        $entity = 'Jbig3Tryings\Entity\DoctrineTestEntity';
        $method = 'findAllUsers';

        return new ViewModel(array(
                'doctrineTest' => $em->getRepository($entity)->$method()
            )
        );
    }


}