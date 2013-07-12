<?php

namespace Jbig3User\Controller\Activate;

// TODO: aufräumen
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Stdlib\Hydrator\Reflection as ZendReflection,
    Zend\Stdlib\ResponseInterface as Response,
    Zend\Debug\Debug;
use Jbig3User\Service\Activate\ActivateService,
    Jbig3User\Controller\UserController;

use Jbig3Mail\Message\MailMessage as MailMessageObj,
    Jbig3Mail\Transport\MailTransport as MailTransportObj;


class ActivateController extends UserController
{
    const ROUTE_ACTIVATE_FORM = 'user-activate-form';
    const ROUTE_ACTIVATE_SUCCESS = 'user-activate';
    const VIEW_VARIABLE = 'activate';

    protected $mailMessageObj;
    protected $mailTransportObj;

    public function getViewModel($content)
    {
        return array(
            self::VIEW_VARIABLE => $content
        );
    }

    public function setMailMessageObj(MailMessageObj $mailMessageObj)
    {
        $this->mailMessageObj = $mailMessageObj;
    }


    public function getTransportEmail()
    {
        return $this->mailTransportObj;
    }

    public function setMailTransportObj(MailTransportObj $mailTransportObj)
    {
        $this->mailTransportObj = $mailTransportObj;
    }

    public function activateFormAction()
    {
        $redirectUrl = $this->url()->fromRoute(static::ROUTE_ACTIVATE_FORM);
        $prg = $this->prg($redirectUrl, true);

        $activateForm = $this->getViewModel($this->service->getForm());

        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return $activateForm;
        }

        $post = $prg;
        $user = $this->service->activateForm($post);

        if ($user == 'isActive') {
            $messageIsActive = $this->translator->translate('isActive', $this->textDomain);
            $this->flashMessenger()->addMessage($messageIsActive);
            return $activateForm;
        }

        if (!$user) {
            return $activateForm;
        }

        $messageActiveSuccess = $this->translator->translate('activeSuccess', $this->textDomain);
        $this->flashMessenger()->addMessage($messageActiveSuccess);

        return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_ACTIVATE_SUCCESS));
    }

    public function activateMailAction()
    {
        $mailSend = $this->mailMessageObj;
        $mailSend//->create()
//            ->setEncoding('encoding-Action')
//            ->setFrom('FromErdmann@Contrller.de', 'FromNameController')
//            ->setReplyTo('Reply@Controller.com', 'ReplyControllerName')
            ->setTo('gregory@n-28.com', 'Gregor aus ActionController')
//            ->setSubject(null, null, 'SubjectString')
//            ->setBody($template, $templateVars, 'String')


//            ->setReplyTo('ReplyToAction')
            ;
//        $mailSend->setFrom();
//            ->setFrom('erdmann');
//        Debug::dump($mailSend->getMailAddressObj());
//        $sendMail->getMailAddressObj()
//                ->setTo('gregory@n-28.comer')
//                ->setFrom('mir')
        ;
//        Debug::dump($mailSend);

//
        $mailTransport = $this->mailTransportObj;
        $mailTransport->send($mailSend);

//        Debug::dump($sendMail);
//        $email = $this->mailMessageObj;
//        $email
//            ->create()
//                ->setEncoding('utf-8')
//                ->setFrom('from@controller.com')
//                ->setFrom('from@controller.com', 'FromName')
//
//                ->setReplyTo('gregory@n-28.com')
//                ->setReplyTo('reply@controller.com', 'ReplyNameController')
//                ->addReplyTo('addReply@controller.com')
//                ->addReplyTo('addReply2@controller.com', 'AddReplyNameController')
//
//            ->setTo('gregory@n-28.com')
////            ->setTo('set3To@Controller.com', 'Add2ToName')
////            ->addTo('addTo@controller.com')
////            ->addTo('add2To@controller.com', 'AddToName')
//
//
//            // TODO: sind alles nur noch optional
//            ->setSubject('alternativ') // Template übergeben
//            ->setType() // txt, html, multi
//            ->setBody() // Template + Layout übergeben
//        // TODO: sollte ganz raus können
////            ->getHeaders()->get('content-type')->setType('multipart/alternative')
//            ->send();

//        Debug::dump($email->getHeaders()->get('content-type'));

//        $transport = $this->mailTransportObj;
        // TODO: Logik in EmailTransport - ist nicht Optional, wird aber auf dem selben Objekt aufgerufen
//        $transport = new MailTransportObj();
//        $transport->send($email);

//        Debug::dump($this->mailMessageObj);

            // TODO: aufräumen
//        $email = $this->email->create();
//        $email->addTo("gregory@n-28.com", "Gregor ERdmann");
//        $this->email->send($email);

//        $email = $this->email->create(array("html_content" => "this is a notice", "subject" => "error"));
//        $this->email->send($email);

//        $email = $this->email->create(array(
//            "name" => "I. Pascual",
//            "location" => "Barcelona"
//        ));
//        $email->setTemplateName("welcome");
//        $email->addTo("gregory@n-28.com", "Gregor ERdmann");
//        $this->email->send($email);

        // TODO: was doch totaler Schwachsinn ist!
        // nicht das KonfigObjekt wird geändert!
        // klar wird die Konfiguration geändert:


        // emailMessageObj->create();
        // emailMessageObj->getConfigObj
        //      ->setFrom()
        //      ->addTo() etc.
        //      ->setTransport('sendmail')
        // emailTransportObj->send(emailMessageObj);


//

//

//
//        $emailConfig->addCc('Addcc aus Controller.de');
//        $emailConfig->addCc('2. Addcc aus Controller.de');
//        $emailConfig->setCc('setCc aus Controller.de');
//        $emailConfig->addCc('3. Addcc aus Controller.de');
//
//        $emailConfig->addBcc('Addbcc aus Controller.de');
//        $emailConfig->addBcc('2. Addbcc aus Controller.de');
//        $emailConfig->setBcc('setbcc aus Controller.de');
//        $emailConfig->addBcc('3. Addbcc aus Controller.de');
//
//        $createEmail = $this->createEmail;
//        $createEmail->create();

//        Debug::dump($createEmail->getMessage());

//        $email->setSubject("Test");
//        $email->setTextContent("Hi, this is a test!");
//        $email->setHtmlContent("<h1>Hi,</h1> <p>this is a test!</p>");
//        $email->addTo("gregory@n-28.com", "Gregor ERdmann");
//        $transportEmail = $this->transportEmail;
//        $transportEmail->setTransport('eimer nach jerusalem');
//        Debug::dump($transportEmail);
//        $transportEmail->getTransportObj()->send($createEmail->getMessage());
//        $transportEmail->getTransportObj()->send($prepareEmail);


//        $email = $this->email->create();
//                $email->addTo("gregory@n-28.com", "Gregor ERdmann");
//
//
////From
//        $email->setFrom("postmaster@yourproject.com");
//        $email->setFromName("Do-Not-Reply");
////ReplyTo
//        $email->setReplyTo("support@yourproject.com");
//        $email->setReplyToName("Support Team");
////Layout
//        $email->setLayoutName("1column");
////Template
//        $email->setTemplateName("welcome");
////To
//        $email->addTo("other@example.com", "Mr. Other Recipient");
////Cc
//        $email->addCc("copy@example.com", "Mr. Copy Recipient");
////Bcc
//        $email->addBcc("other-copy@example.com", "Mr.Not Revealing");
//
//        $this->email->send($email);

//        Debug::dump($email);

        // create the email message
//        $message = new \Zend\Mail\Message();
//        $message->setEncoding('utf-8');
//        $message->addFrom('info@luigis-pizza.de', 'Luigis Pizza');
//        $message->addTo('gregory@n-28.com', 'Horst H. Unger');
//        $message->setSubject('Ihre Bestellung');
//        $message->setBody('Hiermit bestätigen wir Ihre Bestellung.');
//
//        $transport = new \Zend\Mail\Transport\Smtp();
//        $transport->send($message);
//
//// configure transport
//        $options   = new \Zend\Mail\Transport\FileOptions(array(
//            'path'     => BIG5_ROOT . '/data/mail/',
//            'callback' => function (\Zend\Mail\Transport\File $transport) {
//                return 'Message_' . microtime(true) . '_' . mt_rand() . '.txt';
//            },
//        ));
//        $transport = new \Zend\Mail\Transport\File($options);
//
//// send mail
//        $transport->send($message);
//
//// output last file
//        include $transport->getLastFile();

        return $this->getViewModel('aus Controller activateMailAction');
    }

    public function activateAction()
    {
        return $this->getViewModel('erstmal nur ein Text');
    }


}