<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>カテゴリ検索</title>
</head>
<body>
    <!-- 結果を表示するエリア -->
    <?php
        require("function.php");

        $Category = getCategory("large");
        $ID = "";

        foreach($Category as $items) :
    ?>
        <!-- search.phpにカテゴリのIDを渡す -->
        <form action="search.php" method="post">
            <input type="hidden" name="categoryId" value="<?php echo $items["id"]; ?>">
            <input type="submit" name="categoryName" value="<?php echo $items['name']; ?>">
        </form>
    <?php
        endforeach;
    ?>
</body>
</html>