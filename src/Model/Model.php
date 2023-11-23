<?php
declare(strict_types=1);

namespace App\Model;

use App\Helper as h;
class Model
{
    public function getArticles(): array
    {
        return json_decode(file_get_contents( 'db/article.json'),true );
    }
    public function getArticleById(int $id): array
    {
        $articleList = $this->getArticles();
        $curentArticle = [];
        if (array_key_exists($id, $articleList))
        {
            $curentArticle = $articleList[$id];
        }
        return $curentArticle;
    }
}
