<?php

namespace Jbig3Tryings\Form;

use Zend\Debug\Debug;


class RegisterForm extends TryingsBaseForm
{
    public function __construct($name, $baseFormInputFilter)
    {
        parent::__construct($name, $baseFormInputFilter);

        // funktioiert nicht so wie gewollt
        // scheit beides nur über Fieldsets zu gehen
        $this->get('submit')->setLabel('RegisterAusRegsiterForm');
    }

    // auch die Frage, ob das hier funktioniert, oder Fieldsets doch nowenig sind?
    public function setFieldsetValidationGroup()
    {
        $this->setValidationGroup(array(
            'userFieldset' => array(
                'firstname',
                'surname',
                'password'
            )
        ));
    }
}
