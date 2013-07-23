<?php

namespace Jbig3User\Frontend\Form\Activate;

use Zend\Validator\StringLength as ZendStringLength,
    Zend\Validator\EmailAddress as ZendEmailAddress;

use Zend\Debug\Debug;

use Jbig3User\General\Form\UserBaseFormFilter;

class ActivateFormFilter extends UserBaseFormFilter
{
    public function __construct($emailRecordExistsValidator, $activateNoRecordExistsValidator)
    {
        parent::__construct($emailRecordExistsValidator, $activateNoRecordExistsValidator);

        $this->add($this->getActivateFilter());
    }
}
