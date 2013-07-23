<?php

namespace Jbig3Tryings\Crud\Solo;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Stdlib\Hydrator\Reflection as ZendReflection;

use Zend\Debug\Debug;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\Solo\CrudSoloEntity;
use Jbig3Tryings\Crud\Solo\CrudSoloCreateForm;
use Jbig3Tryings\Crud\Solo\CrudSoloUpdateForm;
use Jbig3Base\Entity\Mapper\BaseMapper;
use Jbig3User\General\Entity\UserEntity;

class CrudSoloController extends AbstractActionController
{

    protected $em;
    protected $entityFqcn = 'Jbig3Tryings\Crud\Solo\CrudSoloEntity';



    public function createAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $form = new CrudSoloCreateForm($objectManager);

        $entity = new CrudSoloEntity();
        $form->bind($entity);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                var_dump($form->getData());

                $this->em = $this
                    ->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager');

                $this->em->persist($entity);
                $this->em->flush();
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

        return $this->redirect()->toUrl($this->url()->fromRoute('crud-solo-read'));
    }

    public function readAction()
    {
        $em = $this->getServiceLocator()->get('jbig3-em');

        $solo = $em->getRepository($this->entityFqcn)->findAll();

        $viewModel = $this->getViewModel('solo', $solo);
        return $viewModel;
    }

    public function updateAction()
    {

        $field = 'id';
        $value = $this->getEvent()->getRouteMatch()->getParam($field);

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $form = new CrudSoloUpdateForm($objectManager);

        $entityObj = $objectManager->getRepository($this->entityFqcn)->findOneBy(array($field => $value));
        $form->bind($entityObj);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                var_dump($form->getData());

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

        return $this->redirect()->toUrl($this->url()->fromRoute('crud-solo-read'));
    }

    public function deleteAction()
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
        return $this->redirect()->toUrl($this->url()->fromRoute('crud-solo-read'));
    }

    public function getViewModel($ViewVariable, $content)
    {
        return array(
            $ViewVariable => $content
        );
    }
}