<?php

namespace Jbig3User\General\Form;

use Zend\InputFilter\InputFilter as ZendInputFilter,
    Zend\Validator\StringLength as ZendStringLength,
    Zend\Validator\EmailAddress as ZendEmailAddress;

use Zend\Debug\Debug;

class UserBaseFormFilter extends ZendInputFilter
{
    const NAME_LENGTH_MIN = 3;
    const NAME_LENGTH_MAX = 255;
    const PASSWORD_LENGTH_MIN = 6;
    const PASSWORD_LENGTH_MAX = 255;
    const EMAIL_LENGTH_MAX = 255;

    protected $emailRecordExistsValidator;
    protected $activateNoRecordExistsValidator;

    public function __construct($emailRecordExistsValidator, $activateNoRecordExistsValidator)
    {
        $this->emailRecordExistsValidator = $emailRecordExistsValidator;
        $this->activateNoRecordExistsValidator = $activateNoRecordExistsValidator;
    }

    public function getFirstnameFilter()
    {
        return array(
            'name' => 'firstname',
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
                )
            )
        );
    }

    public function getSurnameFilter()
    {
        return array(
            'name' => 'surname',
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
                )
            )
        );
    }

    public function getEmailFilter()
    {
        return array(
            'name' => 'email',
            'validators' => array(
                array(
                    'name' => 'EmailAddress',
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'max' => self::EMAIL_LENGTH_MAX,
                    ),
                ),
                $this->emailRecordExistsValidator,
            )
        );
    }

    public function getPasswordFilter()
    {
        return array(
            'name' => 'password',
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => self::PASSWORD_LENGTH_MIN,
                        'max' => self::PASSWORD_LENGTH_MAX,
                    ),
                ),
            ),
        );
    }

    public function getActivateFilter()
    {
        return array(
            'name' => 'activate',
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )),
            'validators' => array(
                $this->activateNoRecordExistsValidator,
            )
        );
    }

}
