<?php
$message = date('Y/m/d/l');
?>

<?php

//1.  DB接続します

session_start();
  //1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();



//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM honer_db ");
$status = $stmt->execute();

//３．データ表示

if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
//Selectデータの数だけ自動でループしてくれる
//FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $ID = $result["lid"] ;
        $PW = $result["lpw"] ;
        $pet = $result["pet"] ;
        $name = $result["name"] ;
        $address = $result["address"] ;
        $email = $result["email"] ;
        $pname = $result["pname"] ;
        $sex = $result["sex"] ;
        $birth = $result["birth"] ;
        $sp = $result["sp"] ;
        $mhistory = $result["mhistory"] ;
        $hospital = $result["hospital"] ;
        $text = $result["comment"] ;
        // $image .= $image["image"]
        $view = '<li><a href="profile_modi.php?id='.$result["id"].'">個人情報修正</a></li>';

    }

}
?>





<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pets profile</title>
    <link rel='stylesheet' href='css/reset.css'>
    <link rel='stylesheet' href='css/style.css'>
</head>

<header>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="navbar-header"><a class="navbar-brand" href="index.php">ログイン</a></div>
            <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
        </div>
    </div>
</nav>
</header>


<body>
    <div class='wrap'>
        <div class='prof'>
            <div class='prof__img active'><img src="./img/2_Precious_Pets_2-1.jpg"; alt=""></div>
            <!-- $imageを入れたい -->
            <div class='prfo__contents'>
                <div class='prof__name'>Profile</div>
                <div class='prof__text'><?= $message?></div>
                <div class='prof__text'></div>
            </div>
        </div>
        <!-- /.prof -->
        <div class="profile">
            <dl class ='profile-list'>
                <dt class="profile-title">ID:</dt>
                <dd class="profile-items"><?=$ID;?></dd>
                <dt class="profile-title">PW:</dt>
                <dd class="profile-items"><?=$PW;?></dd>

                
                

                <dt class="profile-title profile-radio">飼っているペットはなにかな？</dt>
                <dd class="profile-items"><?=$pet;?></dd>

                

                <dt class="profile-title">主人名前： </dt>
                <dd class="profile-items"><?=$name;?></dd>
                <dt class="profile-title">住所：</dt>
                <dd class="profile-items"><?=$address;?></dd>
                <dt class="profile-title">EMAIL：</dt>
                <dd class="profile-items"><?=$email;?></dd>
                <dt class="profile-title">ペットの名前：</dt>
                <dd class="profile-items"><?=$pname;?></dd>
                <dt class="profile-title">性別：</dt>
                <dd class="profile-items"><?=$sex;?></dd>
                <dt class="profile-title">誕生日：</dt>
                <dd class="profile-items"><?=$birth;?></dd>
                <dt class="profile-title">種類：</dt>
                <dd class="profile-items"><?=$sp;?></dd>
                <dt class="profile-title">既往歴：</dt>
                <dd class="profile-items"><?=$mhistory;?></dd>
                <dt class="profile-title">かかりつけの病院：</dt>
                <dd class="profile-items"><?=$hospital;?></dd>
                <dt class="profile-title">ペットの好きなものや特徴を好きに書いてね！！！</dt>
                <dd class="profile-items"><?=$text;?></dd>
                <dt class="profile-title"><label>画像を選択</label></dt>
            </dl>
        </div>
        <!-- /.contents -->

        <div class='contents'>
            <div class='title'>ログイン</div>
            <ul>
                <?=$view?>
                <li><a href="log.php">今までの記録を確認</a></li>
            </ul>
            <div class='text'></div>
        </div>
        <!-- /.contents -->

        <!-- iconの後半角スペースを入れること -->

        <footer class='footer'>
            <small class='copy'>&copy;Pets Form</small>
        </footer>

    </div>
</body>
</html>