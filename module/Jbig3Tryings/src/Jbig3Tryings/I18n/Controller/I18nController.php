<?php

namespace Jbig3Tryings\I18n\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Zend\Debug\Debug;
use Zend\I18n\Translator\Translator;
use Zend\MVC\I18n\Translator as MVCTranslator;
use Locale,
    DateTime;
use Zend\Validator\AbstractValidator;
use Zend\Validator\EmailAddress;
use Zend\Validator\Hostname;
use Zend\Validator\Isbn;

class I18nController extends AbstractActionController
{

    public function translateAction()
    {
        return new ViewModel(
            array(
//                'translateString' => 'erste Ausgabe aus Controller'
            )
        );

    }

    public function dateFormatHelperAction(){

        $dateObj = new DateTime();

        // zB. aus einer DB
        $dateString = '2013-10-23 20:15:00';

        return array(
            'dateObj' => $dateObj,
            'dateString' => $dateString
        );
    }

    public function numberFormatHelperAction(){

        $number = 123456789.123456789;
        $price = 1039.32;


        return array(
            'number' => $number,
            'price'=> $price
        );
    }

    public function validateAction()
    {



        return new ViewModel(
            array(
            )
        );
    }

}