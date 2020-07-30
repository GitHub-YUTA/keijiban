<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>【演習】PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    mb_internal_encoding("utf8");

    require "DB.php";
    $dbcoonect =new DB();
    $pdo = $dbcoonect->connect();
    $stmt = $pdo->prepare($dbcoonect->select());
    $stmt->execute();

    // $pdo=new PDO("mysql:dbname=yuta;host=localhost;","root","");
    // $stmt=$pdo->query("select*from 4each_keijiban");

    // while($row=$stmt->fetch()){
    //     echo $row["handlename"];
    //     echo $row["title"];
    //     echo $row["comments"];
    // }
?>

    <header>
        <img src="4eachblog_logo.jpg">
        <br>
        <ul class="top">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </header>
    <main>
        <div class="layout">
            <div class="left">
                <h1>プログラミングに役立つ掲示板</h1>

                <form method="post" action="insert.php">
                    <p>入力フォーム</p>
                    <div>
                        <label>ハンドルネーム</label>
                        <br>
                        <input type="text" class="text" size="30" name="handlename" placeholder="名前を入力してください">    
                    </div>
                    <div>
                        <label>タイトル</label>
                        <br>
                        <input type="text" class="text" size="30" name="title" placeholder="タイトルを入力してください
                        ">    
                    </div>
                    <div>
                        <label>コメント</label>
                        <br>
                        <textarea class="text" rows="10" cols="50" name="comments" placeholder="本文を入力してください"></textarea>
                    </div>
                    <div>
                        <input type="submit" class="submit" value="投稿する">
                    </div>
                </form>
                <br>
            <?php
                while($row=$stmt->fetch()){
                    echo '<div class="dummy">';
                    echo    "<h2>".$row["title"]."</h2>";
                    echo    "<p>".$row["comments"];
                    echo    "<br>";
                    echo    "</p>";
                    echo    "<p>posted by ".$row["handlename"]."</p>";
                    echo "</div>";
                    echo "<br>";
                }
            ?>
                <!-- 
                <div class="dummy">
                    <h2>タイトル</h2>
                    <p>記事の中身。記事の中身。記事の中身。記事の中身。記事の中身。
                    <br>
                    記事の中身。記事の中身。記事の中身。記事の中身。記事の中身。
                    <br>
                    記事の中身。記事の中身。記事の中身。記事の中身。記事の中身。</p>
                    <p>posted by 通りすがり</p>
                </div>
                <br>
                -->
            </div>
            <div class="right">
                <h1 class="sub">人気のオススメ本</h1>
                    <p>PHPオススメ本</p>
                    <p>PHP MyAdminの使い方</p>
                    <p>いま人気のエディタTop5</p>
                    <p>HTMLの基礎</p>
                <h1 class="sub">オススメリンク</h1>
                    <p>インターノウス株式会社
                    </p>
                    <p>XAMPPのダウンロード</p>
                    <p>Eclipseのダウンロード</p>
                    <p>Bracketのダウンロード</p>
                <h1 class="sub">カテゴリ</h1>
                    <p>HTML</p>
                    <p>PHP</p>
                    <p>MySQL</p>
                    <p>JavaScript</p>
            </div>
        </div>
    </main>
    <footer>
        <p>copyright © internous | 4each blog the which provides A toZ about programming.</p>
    </footer>

</body>
</html>