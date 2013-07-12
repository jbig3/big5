<?php
namespace Jbig3Base\View\Helper;

use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\View\Helper\AbstractHelper;

class ShowMessages extends AbstractHelper
{
    protected $flashMessenger;

    public function __construct(FlashMessenger $flashMessenger)
    {
        $this->setFlashMessenger($flashMessenger);
    }

    public function __invoke()
    {
        $messages = array_unique(array_merge(
            $this->flashMessenger->getMessages(),
            $this->flashMessenger->getCurrentMessages()
        ));

        $output = '';

        foreach ($messages as $message) {

            $output .= '<div class="alert">';
            $output .= '<button class="close" data-dismiss="alert" type="button">×</button>';
            $output .= $message;
            $output .= '</div>';
        }

        $this->flashMessenger->clearMessages();
        $this->flashMessenger->clearCurrentMessages();

        return $output . "\n";
    }

    public function setFlashMessenger(FlashMessenger $flashMessenger = null)
    {
        $this->flashMessenger = $flashMessenger;
        return $this;
    }

    public function getFlashMessenger()
    {
        return $this->flashMessenger;
    }
}
