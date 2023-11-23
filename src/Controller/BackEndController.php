<?php
declare(strict_types=1);
namespace App\Controller;

use App\Core\Auth;
use App\Model\Model;
use App\View\BackEndView;
use App\Helper as h;

class BackEndController
{
    use Auth;

    private Model $model;
    private BackEndView $view;

//    public $loader;
//    public $twig;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new BackEndView();
        if (!isset($_SESSION['user'])) {
            $this->login();
        }
//        $this->loader = new \Twig\Loader\FilesystemLoader('template/frontend/');
//        $this->twig = new \Twig\Enviroment($this->loader, []);
//        $this->twig = new \Twig\Environment($this->loader, [
//        'cache' => '/path/to/compilation_cache',
//        ]);
    }

    public function login()
    {
        if (!isset($_POST['btnLogin'])) {
            $this->showLoginForm();
            exit;
        } else {
            if ($this->checkLogin($_POST['username'], $_POST['password'])) {
                $_SESSION['user'] = 'admin';
                echo $this->view->showAdminPanel();
                exit;
            } else{
                $this->goUrl('/admin');
            }
        }
    }
    /**
     * @param $url
     * редирект на указаный URL
     */
    public function goUrl(string $url)
    {
        echo '<script type="text/javascript">location="';
        echo $url;
        echo '";</script>';
    }

    public function showArticleList($articles)
    {
        echo $this->twig->render('layout.twig', ['articles' => $articles]);
    }

    public function showSingleArticle($article)
    {
        echo $this->twig->render('blog.twig', ['articles' => $article]);
    }

    function  showLoginFrom(){
        echo $this->twig->render('login-panel.twig');
    }



//    public function Login()
//    {
//
//        if (!isset($_POST['btnLogin']))
//        {
//            $this->goUrl('/admin');
//        }
//        else{
//            if($this->checkLogin($_POST['username'], $_POST['password'])==true){
//                $_SESSION['user'] = 'admin';
//                echo $this->view->showAdminPanel();
//                exit;
//            } else{
//                $this->goUrl('/admin');
//            }
//        }
//    }

    public function checkLogin(string $login, string $password): bool
    {
        if ($login == 'admin' and $password == '1') {
            return true;
        } else {
            return false;
        }
    }

//    public function LoginView()
////    {
////        $this->view->showLoginPanel();
////    }

    public function showAdminPanel()
    {
        $this->view->AdminView();
    }
}