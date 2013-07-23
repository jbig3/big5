<?php
namespace Jbig3Tryings\Crud\OneToMany\Collection;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Stdlib\Hydrator\Reflection as ZendReflection;

use Zend\Debug\Debug;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserEntity;
use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionCreateForm;
use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUpdateForm;


use Jbig3Tryings\Crud\Solo\CrudSoloUpdateForm;
use Jbig3Base\Entity\Mapper\BaseMapper;
use Jbig3User\General\Entity\UserEntity;

class CrudOtmCollectionController extends AbstractActionController
{

    protected $em;
    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserEntity';
    protected $entity2Fqcn = 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserAddressEntity';

    public function createAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $entity = new CrudOtmCollectionUserEntity();
        $form = new CrudOtmCollectionCreateForm($objectManager);


        $form->bind($entity);


        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            Debug::dump($this->getRequest()->getPost());

            if ($form->isValid()) {

                $objectManager->persist($entity);
                $objectManager->flush();
            } else {
                return new ViewModel(
                    array(
                        'form' => $form
                    )
                );
            }
        } else {
            return new ViewModel(
                array(
                    'form' => $form
                )
            );
        }

        return $this->redirect()->toUrl($this->url()->fromRoute('crud-otm-collection-read'));
    }

    public function readAction()
    {
        $em = $this->getServiceLocator()->get('jbig3-em');

        $solo = $em->getRepository($this->entityFqcn)->findAll();

        $viewModel = $this->getViewModel('otm', $solo);
        return $viewModel;
    }

    public function updateAction()
    {

        $field = 'id';
        $value = $this->getEvent()->getRouteMatch()->getParam($field);

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $form = new CrudOtmCollectionCreateForm($objectManager);

        $entityObj = $objectManager->getRepository($this->entityFqcn)->findOneBy(array($field => $value));
        $form->bind($entityObj);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $objectManager->persist($entityObj);
                $objectManager->flush();
            } else {
                return new ViewModel(
                    array(
                        'form' => $form
                    )
                );
            }
        } else {
            return new ViewModel(
                array(
                    'form' => $form
                )
            );
        }

        return $this->redirect()->toUrl($this->url()->fromRoute('crud-otm-collection-read'));
    }

    public function deleteUserAction()
    {

        $em = $this->getServiceLocator()->get('jbig3-em');
        $field = 'id';
        $value = $this->getEvent()->getRouteMatch()->getParam($field);

        if (isset($value)) {
            $er = $em->getRepository($this->entityFqcn)->findOneBy(array($field => $value));
            if ($er) {
                $em->remove($er);
                $em->flush();
            }
        }
        return $this->redirect()->toUrl($this->url()->fromRoute('crud-otm-collection-read'));
    }

    public function deleteUserAddressAction()
    {

        $em = $this->getServiceLocator()->get('jbig3-em');
        $field = 'id';
        $value = $this->getEvent()->getRouteMatch()->getParam($field);

        if (isset($value)) {
            $er = $em->getRepository($this->entity2Fqcn)->findOneBy(array($field => $value));
            if ($er) {
                $em->remove($er);
                $em->flush();
            }
        }
        return $this->redirect()->toUrl($this->url()->fromRoute('crud-otm-collection-read'));
    }

    public function getViewModel($ViewVariable, $content)
    {
        return array(
            $ViewVariable => $content
        );
    }
}