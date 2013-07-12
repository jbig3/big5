<?php

namespace Jbig3User\Form\Register;

use Zend\InputFilter\InputFilter as ZendInputFilter,
    Zend\Validator\StringLength as ZendStringLength,
    Zend\Validator\EmailAddress as ZendEmailAddress,
    Zend\Debug\Debug;
use Jbig3User\Form\UserBaseFormFilter;

class RegisterFormFilter extends UserBaseFormFilter
{
    public function __construct($emailRecordExistsValidator, $activateNoRecordExistsValidator)
    {
        parent::__construct($emailRecordExistsValidator, $activateNoRecordExistsValidator);

        $this->add($this->getFirstnameFilter());
        $this->add($this->getSurnameFilter());
        $this->add($this->getEmailFilter());
        $this->add($this->getPasswordFilter());
    }
}
