<?php

namespace Jbig3User\Frontend\Form\Register;

use Zend\Debug\Debug;

use Jbig3User\General\Form\UserBaseForm,
    Jbig3User\Module;

class RegisterForm extends UserBaseForm
{
    public function __construct($name, $translator, $action, $inputFilter)
    {
        parent::__construct($name, $translator);

        $this->setAttribute('action', $action);
        $this->setInputFilter($inputFilter);
        $value = $translator->translate('submitRegister', Module::USER_TEXT_DOMAIN);

        $this->add($this->setIdElement());
        $this->add($this->setFirstnameElement());
        $this->add($this->setSurnameElement());
        $this->add($this->setEmailElement());
        $this->add($this->setPasswordElement());
//        $this->add($this->setActivate());
        $this->add($this->setCsrf());
        $this->add($this->setSubmitElement($value));

    }
}
