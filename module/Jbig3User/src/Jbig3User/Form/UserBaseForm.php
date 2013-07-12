<?php
namespace Jbig3User\Form;

use Zend\Form\Form;

use Jbig3Base\Form\BaseForm;

class UserBaseForm extends BaseForm
{
    const CSRF_TIMEOUT = 600;

    protected $textDomain = 'Jbig3User';

    public function __construct($name = null, $translator = null)
    {
        parent::__construct($name, $translator);
    }

    public function setIdElement()
    {
        return array(
            'name' => 'id',
            'type' => 'hidden',
            'attributes' => array(),
        );
    }

    public function setFirstnameElement()
    {
        return array(
            'name' => 'firstname',
            'type' => 'text',
            'attributes' => array(
                'size' => 100,
                'required' => 'required',
                'autofocus' => 'autofocus',
            ),
            'options' => array(
                'label' => $this->translator->translate('FIRSTNAME_LABEL', $this->textDomain),
            ),
        );
    }


    public function setSurnameElement()
    {
        return array(
            'name' => 'surname',
            'type' => 'text',
            'attributes' => array(
                'required' => 'required'
            ),
            'options' => array(
                'label' => $this->translator->translate('SURNAME_LABEL', $this->textDomain),
            ),
        );
    }

    public function setEmailElement()
    {
        return array(
            'name' => 'email',
            'type' => 'email',
            'attributes' => array(
                'required' => 'required'
            ),
            'options' => array(
                'label' => $this->translator->translate('EMAIL_LABEL', $this->textDomain),
            ),
        );
    }

    public function setPasswordElement()
    {
        return array(
            'name' => 'password',
            'type' => 'password',
            'attributes' => array(
                'required' => 'required'
            ),
            'options' => array(
                'label' => $this->translator->translate('PASSWORD_LABEL', $this->textDomain),
            ),
        );
    }

    public function setActivate()
    {
        return array(
            'name' => 'activate',
            'type' => 'text',
            'attributes' => array(
                'required' => 'required'
            ),
            'options' => array(
                'label' => $this->translator->translate('Activate_Label', $this->textDomain),
            ),
        );
    }

    public function setCsrf()
    {
        return array(
            'name' => 'csrf',
            'type' => 'csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => self::CSRF_TIMEOUT
                )
            )
        );
    }

    public function setSubmitElement($value)
    {
        return array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'id' => 'submit',
                'value' => $value,
            ),
        );
    }
}