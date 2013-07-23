<?php

namespace Jbig3User\General\Form;

use Zend\InputFilter\InputFilter as ZendInputFilter,
    Zend\Validator\StringLength as ZendStringLength,
    Zend\Validator\EmailAddress as ZendEmailAddress;

use Zend\Debug\Debug;

class RoleBaseFormFilter extends ZendInputFilter
{
    const NAME_LENGTH_MIN = 3;
    const NAME_LENGTH_MAX = 255;

    protected $roleRecordExistsValidator;

    public function __construct($roleRecordExistsValidator)
    {
        $this->roleRecordExistsValidator = $roleRecordExistsValidator;
    }

    public function getNameFilter()
    {
        return array(
            'name' => 'name',
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                ),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => self::NAME_LENGTH_MIN,
                        'max' => self::NAME_LENGTH_MAX,
                    ),
                ),
                $this->roleRecordExistsValidator
            )
        );
    }
}
