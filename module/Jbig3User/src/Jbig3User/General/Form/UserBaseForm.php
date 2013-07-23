<?php
namespace Jbig3User\General\Form;

use Zend\Form\Form;

use Zend\Debug\Debug;

use Jbig3Base\Form\BaseFormAbstract,
    Jbig3User\Module;

class UserBaseForm extends BaseFormAbstract
{
    const CSRF_TIMEOUT = 600;

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
                'label' => $this->translator->translate('FIRSTNAME_LABEL', Module::USER_TEXT_DOMAIN),
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
                'label' => $this->translator->translate('SURNAME_LABEL', Module::USER_TEXT_DOMAIN),
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
                'label' => $this->translator->translate('EMAIL_LABEL', Module::USER_TEXT_DOMAIN),
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
                'label' => $this->translator->translate('PASSWORD_LABEL', Module::USER_TEXT_DOMAIN),
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
                'label' => $this->translator->translate('Activate_Label', Module::USER_TEXT_DOMAIN),
            ),
        );
    }

    public function setRoleSelect()
    {
        return array(
            'name' => 'roles',
            'type' => 'select',
            'attributes' => array(
                'required' => 'required',
                'multiple' => 'multiple'
            ),
            'options' => array(
                'label' => $this->translator->translate('ROLES_LABEL', Module::USER_TEXT_DOMAIN),
                'value_options' => array(
                    '1' => 'guest',
                    '2' => 'user',
                    '3' => 'admin'
                )
            )
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