<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>フリーワード検索</title>
    </head>
    <body>        
        <form action="" method="post">
            <input type="text" name="freeword" placeholder="料理名,食材など">
            <input type="submit" name="submit" value="送信">
        </form>

        <?php
            require("function.php");
            
            if(isset($_POST["categoryId"])) :  
                $id = $_POST["categoryId"];
                $CategoryRank = getCategoryRank($id);
        ?>
        <!-- category.phpからきた場合 -->
        <!-- getメソッドで送られてきたカテゴリ番号のランキングを表示 -->
            カテゴリランキング<br>

            <?php
                foreach($CategoryRank as $items) :
                    echo $items["title"]." ";
            ?>

            <a href="" target="_blank" rel="noopener">リンク</a>
            <br>

                <?php endforeach; ?>


        <?php else : ?>
        <!-- 普通にフリーワード検索がしたい場合 -->
        <!-- 最初はなにも表示せず検索結果を表示 -->
            フリーワード検索結果<br>
        <?php endif; ?>
    </body>
</html>

<?php
    // $freeword = $_POST["freeword"];
?>