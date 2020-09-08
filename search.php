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
    </body>
</html>

<?php
    $_POST["freeword"] = $freeword
    function getAPI($freeword){
        //リクエストURLのベース
        //そもそもフリーワード検索が可能なのか。検討。

    }
?>