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
            echo $items["name"]."<br>";
            echo $items["id"]."<br>";
        }
    ?>
</body>
</html>

<?php
    function getCategory($hoge){
        // リクエストURL
        $url = "https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?format=json&categoryType=large&applicationId=1017259887045805155";

        // XMLをオブジェクトに代入
        $json = file_get_contents($url);
        $rakuten_json=json_decode($json, true);
        var_dump($rakuten_json);

        $results = array();
        foreach($rakuten_json->result as $result){
            $results[] = array(
                "name" => (string)$result->categoryName,
                "id" => (string)$result->categoryId,
            );
        }

        return $results;
    }

?>