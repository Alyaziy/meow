<?php
declare(strict_types=1);

namespace App\View;

class View
{
    public $loader;
    public $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('template/frontend/');
        //$this->twig = new \Twig\Enviroment($this->loader, []);
        $this->twig = new \Twig\Environment($this->loader, [
            //'cache' => '/path/to/compilation_cache',
        ]);
    }

    public function showArticleList($articles)
    {
        echo $this->twig->render('layout.twig', ['articles' => $articles]);
    }

    public function showSingleArticle($article)
    {
        echo $this->twig->render('blog.twig', ['articles' => $article]);
    }

    function  showLoginPanel(){
        echo $this->twig->render('login-panel.twig');
    }
}