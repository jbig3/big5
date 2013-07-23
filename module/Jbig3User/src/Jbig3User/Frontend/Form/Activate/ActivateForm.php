<?php

namespace Jbig3User\Frontend\Form\Activate;

use Zend\Debug\Debug;

use Jbig3User\General\Form\UserBaseForm,
    Jbig3User\Module;

class ActivateForm extends UserBaseForm
{
    public function __construct($name, $translator, $action, $inputFilter)
    {
        parent::__construct($name, $translator);

        $this->setAttribute('action', $action);
        $this->setInputFilter($inputFilter);
        $value = $translator->translate('submitActivate', Module::USER_TEXT_DOMAIN);


        $this->add($this->setIdElement());
        $this->add($this->setActivate());
        $this->add($this->setCsrf());
        $this->add($this->setSubmitElement($value));

    }
}
