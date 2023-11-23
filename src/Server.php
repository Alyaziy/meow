<?php
namespace App\View;
class Server
{
    private $view;
    public function _construct()
    {
        $this->view = new \View();
    }

    public function i()
    {
        $this->view->showLogin();
    }
}