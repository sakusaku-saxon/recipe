<!-- 関数をまとめたファイル -->
<?php 
    //楽天レシピカテゴリ一覧APIからのデータ取得
    function getCategory($categoryType){
        // リクエストURL
        $url = "https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?format=json&categoryType=".$categoryType."&applicationId=1017259887045805155";

        // APIから情報を取得
        $contents = @file_get_contents($url);
        $json = json_decode($contents, true);

        //取得したJSONファイルからカテゴリID、カテゴリ名、URLを抽出して整列
        $results = array();
        foreach($json["result"]["large"] as $js){
            $results[] = array(
                "id" => (string)$js["categoryId"],
                "name" => (string)$js["categoryName"],
                "url" => (string)$js["categoryUrl"],
                "parentId" => (string)$js["parentCategoryId"]
            );

        }

        return $results;
    }

    function search($freeword){
        //リクエストURLのベース
        //そもそもフリーワード検索が可能なのか。検討。

    }
    //楽天レシピカテゴリ別ランキングAPIからのデータ取得
    function getCategoryRank($id){

        //入力パラメータにカテゴリIDを含める
        $url = "https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?format=json&applicationId=1017259887045805155&categoryId=".$id;
        
        //APIから情報を取得
        $contents = @file_get_contents($url);
        $json = json_decode($contents, true);

        //取得したJSONデータからレシピタイトルを抽出して整列
        $results = array();

        foreach($json["result"] as $js){
            $results[] = array(
                "title" => (string)$js["recipeTitle"],
                "url" => (string)$js["recipeUrl"]
            );
        }

        return $results;
    }
?>