<?php
namespace Jbig3Tryings\Form;

use Zend\Form\Form;

class TryingsBaseForm extends Form
{
    const ROUTE = '/try/form/standard';
    const CSRF_TIMEOUT = 600;

    public function __construct($name = null, $baseFormInputFilter)
    {
        parent::__construct($name);
        $this->setAttribute('action', self::ROUTE);

        $this->setInputFilter($baseFormInputFilter);

        $this->add($this->setIdElement());
        $this->add($this->setFirstnameElement());
        $this->add($this->setSurnameElement());
        $this->add($this->setEmailElement());
        $this->add($this->setPasswordElement());
        $this->add($this->setCsrf());
        $this->add($this->setSubmitElement());

    }

    private function setIdElement()
    {
        return array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        );
    }

    public function setFirstnameElement()
    {
        return array(
            'name' => 'firstname',
            'type' => 'text',
            'options' => array(
                'label' => 'Vorname',
            ),
            'attributes' => array(
                'required' => 'required',
                'autofocus' => 'autofocus',
            )
        );
    }


    private function setSurnameElement()
    {
        return array(
            'name' => 'surname',
            'type' => 'text',
            'options' => array(
                'label' => 'Nachname',
            ),
            'attributes' => array(
                'required' => 'required'
            )
        );
    }

    private function setEmailElement()
    {
        return array(
            'name' => 'email',
            'type' => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'required' => 'required'
            )
        );
    }

    private function setPasswordElement()
    {
        return array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'required' => 'required'
            )
        );
    }

    public function setCsrf()
    {
        return array(
            'type' => 'csrf',
            'name' => 'csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => self::CSRF_TIMEOUT
                )
            )
        );
    }

    public function setSubmitElement()
    {
        return array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'id' => 'submit',
                'value' => 'Registrieren'
            ),
        );
    }
}