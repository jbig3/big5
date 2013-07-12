<?php


namespace Jbig3Tryings\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;


/**
 * @author Gregory
 * @version 1.0
 * @created 02-Jun-2013 10:31:25
 */

class StandardFieldset extends Fieldset
{

    // TODO: fürs erste nicht weiter entwickeln, aber
    // scheint doch ganz einfach:
    //  - TryingsFieldset
    //      - enthät alle Felder und
    //      - getInputFilterSpecification
    //      - notwenige Abhänigkeiten wrden über Facotry reingereicht
    //  - RegsiterFieldset
    //      - instanz TryingsFieldset
    //      - schließt Felder aus
    //      - getValidationGroup()
    public function __construct()
    {
        parent::__construct('formName');

//        $this->setFieldsetHydrator();
//        $this->setFieldsetObject($this->fieldsetObject);
//        $this->add($this->setIdElement());
        $this->add($this->setFirstnameElement());
        $this->add($this->setSurnameElement());
        $this->add($this->setEmailElement());
        $this->add($this->setPasswordElement());
        $this->add($this->setCsrf());

    }

    public function setFieldsetHydrator()
    {
        $this->setHydrator(new ClassMethodsHydrator(false));
    }

    public function setFieldsetObject($fieldsetObject)
    {
        $this->setObject(new $fieldsetObject());
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
        // TODO: Vorname Translate
        return array(
            'name' => 'firstname',
            'type' => 'Jbig3User\Form\Element\Firstname',
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
        // TODO: Nachname Translate
        return array(
            'name' => 'surname',
            'type' => 'Jbig3User\Form\Element\Surname',
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
        // TODO: Email Translate
        return array(
            'name' => 'email',
            'type' => 'Jbig3User\Form\Element\Email',
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
        // TODO: Password Translate
        return array(
            'name' => 'password',
            'type' => 'Jbig3User\Form\Element\Password',
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

        // TODO: Message / Translate
        return array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        );
    }

    public function getInputFilterSpecification(){

        return array(
            'firstname' => array(
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
                                ZendStringLength::INVALID   => "nicht richtig",
                                ZendStringLength::TOO_SHORT => "zu kurz",
                                ZendStringLength::TOO_LONG  => "zu lang",
                            )
                        ),

                    )
                )
            ),
            // und alle anderen!
        );
    }


}