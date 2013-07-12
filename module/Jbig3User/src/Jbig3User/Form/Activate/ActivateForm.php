<?php

namespace Jbig3User\Form\Activate;

use Zend\Debug\Debug;
use Jbig3User\Form\UserBaseForm;



class ActivateForm extends UserBaseForm
{
    protected $textDomain = 'Jbig3User';

    public function __construct($name, $translator, $action, $inputFilter)
    {
        parent::__construct($name, $translator);

        $this->setAttribute('action', $action);
        $this->setInputFilter($inputFilter);
        $value = $translator->translate('submitActivate', $this->textDomain);


        $this->add($this->setIdElement());
        $this->add($this->setActivate());
        $this->add($this->setCsrf());
        $this->add($this->setSubmitElement($value));

    }
}
