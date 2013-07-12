<?php
namespace Jbig3Base\Form;

use Zend\Form\Form;

class BaseForm extends Form
{
    protected $translator;

    public function __construct($name = null, $translator = null)
    {
        parent::__construct($name);

        $this->translator = $translator;
    }
}