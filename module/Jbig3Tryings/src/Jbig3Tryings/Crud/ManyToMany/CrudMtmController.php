<?php
namespace Jbig3Tryings\Crud\ManyToMany;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Stdlib\Hydrator\Reflection as ZendReflection;

use Zend\Debug\Debug;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CrudMtmController extends AbstractActionController
{

    protected $em;
    protected $userEntityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmUserEntity';
    protected $roleEntityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmRoleEntity';


    public function createRoleAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $entity = new CrudMtmRoleEntity();
        $form = new CrudMtmCreateRoleForm($objectManager);
        $form->bind($entity);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

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

        return $this->redirect()->toUrl($this->url()->fromRoute('crud-mtm-role-read'));
    }

    public function readRoleAction()
    {
        $em = $this->getServiceLocator()->get('jbig3-em');

        $role = $em->getRepository($this->roleEntityFqcn)->findAll();

        $viewModel = $this->getViewModel('role', $role);
        return $viewModel;
    }

    public function updateRoleAction()
    {
        $field = 'id';
        $value = $this->getEvent()->getRouteMatch()->getParam($field);

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $form = new CrudMtmUpdateRoleForm($objectManager);

        $entityObj = $objectManager->getRepository($this->roleEntityFqcn)->findOneBy(array($field => $value));
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

        return $this->redirect()->toUrl($this->url()->fromRoute('crud-mtm-role-read'));
    }

    public function deleteRoleAction()
    {
        $em = $this->getServiceLocator()->get('jbig3-em');
        $field = 'id';
        $value = $this->getEvent()->getRouteMatch()->getParam($field);

        if (isset($value)) {
            $er = $em->getRepository($this->roleEntityFqcn)->findOneBy(array($field => $value));
            if ($er) {
                $em->remove($er);
                $em->flush();
            }
        }
        return $this->redirect()->toUrl($this->url()->fromRoute('crud-mtm-role-read'));
    }

    public function createUserAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $entity = new CrudMtmUserEntity();
        $form = new CrudMtmCreateUsersRolesForm($objectManager);
        $form->bind($entity);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

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

        return $this->redirect()->toUrl($this->url()->fromRoute('crud-mtm-user-create'));
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