<?php

namespace Jbig3User\Backend\Form\Role\Insert;

use Zend\Validator\StringLength as ZendStringLength,
    Zend\Validator\EmailAddress as ZendEmailAddress;

use Zend\Debug\Debug;

use Jbig3User\General\Form\RoleBaseFormFilter;

class InsertFormFilter extends RoleBaseFormFilter
{
    public function __construct($emailRecordExistsValidator, $activateNoRecordExistsValidator)
    {
        parent::__construct($emailRecordExistsValidator, $activateNoRecordExistsValidator);

        $this->add($this->getNameFilter());
    }
}
