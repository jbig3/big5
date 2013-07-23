<?php
namespace Jbig3User\General\Form;

use Zend\Form\Form;

use Jbig3Base\Form\BaseFormAbstract,
    Jbig3User\Module;

class RoleBaseForm extends BaseFormAbstract
{
    const CSRF_TIMEOUT = 600;

    public function __construct($name = null, $translator = null)
    {
        parent::__construct($name, $translator);
    }

    // TODO: in BaseForm
    public function setIdElement()
    {
        return array(
            'name' => 'id',
            'type' => 'hidden',
            'attributes' => array(),
        );
    }

    public function setNameElement()
    {
        return array(
            'name' => 'name',
            'type' => 'text',
            'attributes' => array(
                'required' => 'required'
            ),
            'options' => array(
                'label' => $this->translator->translate('ROLE_LABEL', Module::USER_TEXT_DOMAIN),
            ),
        );
    }

    // TODO: kann in BaseForm
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

    // TODO: in BaseForm
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