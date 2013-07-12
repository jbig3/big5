<?php

namespace Jbig3Base\Form\Validator;

class NoRecordExistsValidator extends AbstractRecordValidator
{
    public function isValid($value)
    {
        $valid = true;
        $this->setValue($value);

        $result = $this->query($value);

        if (!$result) {
            $valid = false;
            $this->error(self::ERROR_NO_RECORD_FOUND);
        }

        return $valid;
    }
}
