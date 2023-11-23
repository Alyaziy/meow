<?php
declare(strict_types=1);

namespace App\View;

use Twig\Environment;

class BackEndView
{
    public $loader;
    public $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('template/frontend');
        $this->twig = new Environment($this->loader, []);
    }

    public function showArticleList(array $articles)
    {
        echo $this->twig->render('blog.twig', ['articles' => $articles]);
    }

    public function showSingleArticle($article)
    {
        echo $this->twig->render('single-page.twig', ['article' => $article]);
    }

//    public function Obratno()
//    {
//        echo $this->twig->render('layout.twig');
//    }

    public function showLoginPanel()
    {
        echo $this->twig->render('login-panel.twig');
    }

    public function AdminView()
    {
        echo $this->twig->render('admin-page.twig');
    }

    public function LoginView()
    {
        $this->view->showLoginPanel();
    }

    public function showAdminPanel()
    {
        return $this->twig->render('admin-page.twig');
    }


}