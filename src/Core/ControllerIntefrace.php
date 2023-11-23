<?php
namespace App\Core;

use App\Model;

interface ControllerIntefrace{
    public function _construct(ModelInterface $model,ViewInterface $view);
}