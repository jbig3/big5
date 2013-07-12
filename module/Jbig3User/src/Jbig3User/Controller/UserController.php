<?php

namespace Jbig3User\Controller;

use Jbig3Base\Controller\BaseController;

class UserController extends BaseController
{
    protected $textDomain;


    public function __construct()
    {
        $this->textDomain = 'Jbig3User';
    }



}