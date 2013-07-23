<?php

namespace Jbig3User\Backend\Form\Role\Insert;

use Zend\Debug\Debug;

use Jbig3User\General\Form\RoleBaseForm,
    Jbig3User\Module;

class InsertForm extends RoleBaseForm
{
    public function __construct($name, $translator, $action, $inputFilter)
    {
        parent::__construct($name, $translator);

        $this->setAttribute('action', $action);
        $this->setInputFilter($inputFilter);
        $value = $translator->translate('submitInsert', Module::USER_TEXT_DOMAIN);


        $this->add($this->setNameElement());
        $this->add($this->setCsrf());
        $this->add($this->setSubmitElement($value));
    }
}
