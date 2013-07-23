<?php

namespace Jbig3Tryings\Crud\Mtm\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Jbig3Tryings\Crud\Mtm\Entity\Post as PostEntity;
use Jbig3Tryings\Crud\Mtm\Form\CreatePost as CreatePostForm;
use Jbig3Tryings\Crud\Mtm\Form\UpdatePost as UpdatePostForm;
use Jbig3Tryings\Crud\Mtm\Service\PostService;

class PostController extends AbstractActionController
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    protected $repository;

    /**
     * @var \Jbig3Tryings\Crud\Mtm\Service\PostService
     */
    protected $postService;
    
    /**
     * @param   \Doctrine\ORM\EntityManager             $entityManager
     * @param   \Jbig3Tryings\Crud\Mtm\Service\PostService             $postService
     */
    public function __construct(EntityManager $entityManager, EntityRepository $repository, PostService $postService)
    {
        $this->entityManager = $entityManager;
        $this->repository    = $repository;
        $this->postService   = $postService;
    }
    
    public function newAction()
    {
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute('SxBlog/posts');
        }
        $postEntity     = new PostEntity;
        $form           = new CreatePostForm($this->getServiceLocator());
        $request        = $this->getRequest();
        $message        = null;

        $form->bind($postEntity);

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {

                $this->postService->createPost($postEntity);
                $this->flashMessenger()->setNamespace('sxblog_post')->addMessage($this->messages['post_creation_success']);

                return $this->redirect()->toUrl($this->url()->fromRoute('SxBlog/post/edit', array('slug' => $postEntity->getSlug())));
            } else {
                $message = $this->messages['post_creation_fail'];
            }
        }

        return new ViewModel(array(
            'form'    => $form,
            'message' => $message,
        ));

    }

}
