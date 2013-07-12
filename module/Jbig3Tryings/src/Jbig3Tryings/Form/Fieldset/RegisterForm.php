<?php

namespace Jbig3Tryings\Form\Fieldset;


class RegisterForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->setAttribute('action', self::ROUTE);
        $this->setAttribute('method', self::ROUTE);

        // funktioniert hier nicht mehr / Fieldset braucht getInputFilterSpecification()
        // $this->setInputFilter(new Jbig3RegisterFormFilter);


        $this->add(new StandardFieldset());


    }
}
