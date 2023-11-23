<?php
declare(strict_types = 1);
//if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true)
//{
//    header("Location: formregister.php");
//    exit;
//}
function  dd($some)
{
    echo '<pre>';
    print_r($some);
    echo'</pre>';
}
function getArticles(): array
{
    return json_decode(file_get_contents('db/article.json'), true);
}

function getArticleList(): string
{
    $articles = getArticles();
    $link = '';
    foreach ($articles as $article) {
        $link .= '<li class="nav-item"><a class="nav-link" href="index.php?id='. $article['id']
            .'">'.$article['title'].'</a></li>';
    }
    return $link;
}

function getArticleById(int $id):array
{
    $articleList = getArticles();
    $curentArticle = [];
    if (array_key_exists($id, $articleList)){
        $curentArticle = $articleList[$id];
    }
    return $curentArticle;
}
function showArticle():string
{
    if (isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $curentArticle = getArticleById($id);
        if (!empty($curentArticle)){
            $str = '';
            $str .='<h2>'.$curentArticle['title'].'</h2>';
            $str .='<img src="'.$curentArticle['image'].'" alt="">';
            $str .='<p>'.$curentArticle['content'].'</p>';
        }else{
            $str = 'нету такого';
        }

    }else{
        $str='че надо?';
    }
    return $str;
}
