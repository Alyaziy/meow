<?php
declare(strict_types=1);
namespace App\Controller;

use App\Model\Model;
use App\View\View;
use App\Helper as h;

class FrontEndController
{
    private \App\Model\Model $model;
    private \App\View\View $view;

    public function __construct()
    {
        $this->model = new \App\Model\Model();
        $this->view = new \App\View\View();
    }
    public function articleList()
    {

        $articles = $this->model->getArticles();
        $this->view->showArticleList($articles);
    }
    public function contentArticle($id)
    {
        $article = $this->model->getArticleById((int)$id);
        $this->view->showSingleArticle($article);
    }

//    public function Login()
//    {
//        if (!isset($_POST['btnLogin']))
//        {
//
//        }
//        else{
//            if(checkLogin($_POST['username'], $_POST['password'])){
//                $_SESSION['user'] = 'admin';
//
//                echo 'бывает';
//            } else{
//                $_SESSION['user'] = 'user';
//                echo $this->twig->render('template/frontend');
//            }
//        }
//    }

    public function LoginView()
    {
        $this->view->showLoginPanel();
    }



}