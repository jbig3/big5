<?php

namespace Jbig3User\Form\Activate;

use Zend\Validator\StringLength as ZendStringLength,
    Zend\Validator\EmailAddress as ZendEmailAddress,
    Zend\Debug\Debug;
use Jbig3User\Form\UserBaseFormFilter;

class ActivateFormFilter extends UserBaseFormFilter
{
    public function __construct($emailRecordExistsValidator, $activateNoRecordExistsValidator)
    {
        parent::__construct($emailRecordExistsValidator, $activateNoRecordExistsValidator);

        $this->add($this->getActivateFilter());
    }
}
