<?php

namespace Jbig3User\Backend\Form\Insert;

use Zend\Debug\Debug;

use Jbig3User\General\Form\UserBaseForm,
    Jbig3User\Module;



class InsertForm extends UserBaseForm
{
    public function __construct($name, $translator, $action, $inputFilter)
    {
        parent::__construct($name, $translator);

        $this->setAttribute('action', $action);
        $this->setInputFilter($inputFilter);
        $value = $translator->translate('submitInsert', Module::USER_TEXT_DOMAIN);


        $this->add($this->setFirstnameElement());
        $this->add($this->setSurnameElement());
        $this->add($this->setEmailElement());
        $this->add($this->setPasswordElement());
        $this->add($this->setRoleSelect());
        $this->add($this->setCsrf());
        $this->add($this->setSubmitElement($value));

    }
}
