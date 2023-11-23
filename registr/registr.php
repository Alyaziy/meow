<?php
declare(strict_types = 1);
error_reporting(E_ALL);
ini_set('display_errors', 'on');
//$path = $_SERVER['DOCUMENT_ROOT'];
//include_once $path.'/popik/function.php';
//include_once $path.'/popik/formregister.php';
?>
<header>
    <h1>Это не пипец, это не пипец, это всё пока что лишь отстой, но не пипец</h1>
</header>
<div class="jopa" />
<?php



echo getArticleList();?>

</div>
<div class="popa">
    <?php
    echo showArticle(); ?>
</div>


</body>
<style>
    header {
        background-color: bisque;
        text-align: center;
        margin: 10px;
        vertical-align: center;
    }
    .jopa{
        font-size: 28px;
        background-color: lightpink;

        float: left;
        width: 20%;
    }
    .popa{
        font-size: 30px;
        text-align: center;
        float: right;
        nowrap;
        width: 80%;

    }
    img{
        height: 50%;
    }


</style>