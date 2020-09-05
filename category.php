<!DOCTYPE HTML>
<html>
<head>
    <title>楽天レシピカテゴリ一覧APIのテスト</title>
    <meta charset="utf-8">
</head>
<body>
    <!-- 結果を表示するエリア -->
    <?php
        $Category = getCategory("hoge");

        foreach($Category as $items){          
            echo $items["id"]." ";
            echo $items["name"]."<br>";
        }
    ?>
</body>
</html>

<?php
    function getCategory($hoge){
        // リクエストURL
        $url = "https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?format=json&categoryType=large&applicationId=1017259887045805155";

        // APIから情報を取得
        $contents = @file_get_contents($url);
        $json = json_decode($contents, true);

        $results = array();
        foreach($json["result"]["large"] as $result){
            $results[] = array(
                "name" => (string)$result["categoryName"],
                "id" => (string)$result["categoryId"],
            );
        }

        return $results;
    }

?>