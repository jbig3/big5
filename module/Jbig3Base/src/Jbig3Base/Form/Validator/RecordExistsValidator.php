<?php

namespace Jbig3Base\Form\Validator;

class RecordExistsValidator extends AbstractRecordValidator
{
    public function isValid($value)
    {
        $valid = true;
        $this->setValue($value);

        $result = $this->query($value);
        if ($result) {
            $valid = false;
            $this->error(self::ERROR_RECORD_FOUND);
        }

        return $valid;

    }
}
