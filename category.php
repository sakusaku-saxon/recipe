<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>カテゴリ検索</title>
</head>
<body>
    <!-- 結果を表示するエリア -->
    <?php
        $Category = getCategory("hoge");

        foreach($Category as $items) :
    ?>
    <!-- 大カテゴリごとのページへ遷移(楽天のページ) -->
    <a href="$items['largeUrl']"> <?php echo $items["largeName"]."<br>"; ?> </a>
        
    <?php endforeach; ?>
</body>
</html>

<?php
    function getCategory($hoge){
        // リクエストURL
        $url = "https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?format=json&categoryType=large&applicationId=1017259887045805155";

        // APIから情報を取得
        $contents = @file_get_contents($url);
        $json = json_decode($contents, true);

        //取得したJSONファイルからカテゴリ名、URLを出力
        $results = array();
        foreach($json["result"]["large"] as $result){
            $results[] = array(
                "largeId" => (string)$result["categoryId"],
                "largeName" => (string)$result["categoryName"],
                "largeUrl" => (string)$result["categoryUrl"]
            );
        }

        return $results;
    }

?>