<?php

namespace Jbig3Tryings\Form;

use Zend\InputFilter\InputFilter as ZendInputFilter,
    Zend\Validator\StringLength as ZendStringLength,
    Zend\Debug\Debug;

class TryingsBaseFormFilter extends ZendInputFilter
{
    const NAME_LENGTH_MIN = 3;
    const NAME_LENGTH_MAX = 128;
    const PASSWORD_LENGTH_MIN = 6;

    protected $recordExistsValidator;

    public function __construct($recordExistsValidator)
    {
        $this->recordExistsValidator = $recordExistsValidator;
        $this->add($this->getFirstnameFilter());
        $this->add($this->getSurnameFilter());
        $this->add($this->getEmailFilter());
        $this->add($this->getPasswordFilter());
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
                        'messages' => array(
                            ZendStringLength::INVALID => "nicht richtig",
                            ZendStringLength::TOO_SHORT => "zu kurz",
                            ZendStringLength::TOO_LONG => "zu lang",
                        )
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
                        'min' => 3,
                        'max' => 128
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
                    'name' => 'EmailAddress'
                ),
                $this->recordExistsValidator,
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
                    ),
                ),
            ),
        );
    }

}
