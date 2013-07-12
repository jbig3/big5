<?php

namespace Jbig3Base\Form\Validator;

use Zend\Validator\AbstractValidator,
    Zend\Debug\Debug;
use Jbig3Base\Entity\Mapper\MapperInterface;


abstract class AbstractRecordValidator extends AbstractValidator
{
    const ERROR_NO_RECORD_FOUND = 'noRecordFound';
    const ERROR_RECORD_FOUND    = 'recordFound';

    protected $messageTemplates = array(
        self::ERROR_NO_RECORD_FOUND => "No record matching the input was found",
        self::ERROR_RECORD_FOUND    => "A record matching the input was found",
    );

    protected $mapper;
    protected $field;

    public function __construct($options = null)
    {
        parent::__construct($options);
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($field)
    {
        $this->field = $field;
    }

    public function getMapper()
    {
        return $this->mapper;
    }

    public function setMapper(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    protected function query($value)
    {
        return $this->getMapper()->findBy($this->field, $value);
    }
}
