<?php

declare(strict_types=1);


namespace App\Controller;


use App\Core\Auth;
use App\Helper as h;
use App\View\BackEndView;

class BackController
{
    use Auth;

    private BackEndView $view;

    public function __construct(
        BackEndView $view
    ) {

        $this->view = $view;
        if (!$this->checkAuth()) {
            $this->login();
            exit;
        }
    }

    public function login()
    {
        if (!isset($_POST['btnLogin'])) {
            $this->showLoginPanel();
            exit;
        } else {
            if ($this->checkLogin($_POST['username'], $_POST['password'])) {
                $this->signIn('admin', 1);
                $this->setMessage('Привет $username');
            }
            h::goUrl('/admin/');
        }
    }

    public function checkLogin(string $login, string $password): bool
    {
        if ($login == 'admin' and $password == '1') {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        $this->signOut();
        h::goUrl('/admin/');
    }

    public function showLoginPanel()
    {
        echo $this->backView->showLoginPanel();
    }

    public function setMessage($message, $title ='', $color = 'green', $position = 'topRight' )
    {
        $_SESSION['message'] =
            [
                'color'=>$color,
                'title'=>$title,
                'message'=>$message,
                'position'=>$position
            ];
    }

    public function getMessage()
    {
        $message = null;
        if (isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        return $message;
    }
}