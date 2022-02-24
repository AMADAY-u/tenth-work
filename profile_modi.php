<?php
$message = date('Y/m/d/l');
?>

<?php
//1.  DB接続します

require_once('funcs.php');
$pdo = db_conn();

//loginチェック


/**
 * １．PHP
**/
//GET送信されたidを取得（URLの後ろについているデータ）
$id = $_GET["id"];

//SQLを準備する記述を書きます😊
$stmt = $pdo->prepare('SELECT * FROM honer_db WHERE id=:id;');

//sqlが安全かチェックする
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

//sqlを実行
$status = $stmt->execute();
//statusにするにはif文の時に成功、失敗の時に変数に入れている。

//結果表示
$view = '';

if ($status === false) {
    sql_error($status);//func.phpに記述しているエラーの共通化を活用している。sql_error()
} else {
    $result = $stmt->fetch();//一行しかとってきていないからfetch

}
?>


<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pets form</title>
    <link rel='stylesheet' href='css/reset.css'>
    <link rel='stylesheet' href='css/style.css'>
</head>


<body>

<header>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="navbar-header"><a class="navbar-brand" href="log.php">記録一覧へ</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="index.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </div>
    </nav>
</header>

    <div class='wrap'>
        <div class='prof'>
            <div class='prof__img'><img src='img/2_Precious_Pets_2-1.jpg'alt=''></div>
            <div class='prfo__contents'>
                <div class='prof__name'>Pets Form</div>
                <div class='prof__text'><?php echo $message; ?></div>
            </div>
        </div>
        <!-- /.prof -->

        <div class='contents'>
            <div class='title'>個人情報</div>
            <div class='text'>
                <p>個人の情報の変更したいところを修正してください。<br>
                ※注意；ペットの種類と性別は再入力してね</p>
            </div>
        </div>
        <!-- /.contents -->

        <form action='update.php' method="post" enctype="multipart/form-data">
            <dl class ='profile-list'>
                <dt class="profile-title">ID:</dt>
                <dd class="profile-items"><input type="text" name="lid" value="<?=$result['lid']?>"/></dd>
                <dt class="profile-title">PW:</dt>
                <dd class="profile-items"><input type="password" name="lpw" value="<?=$result['lpw']?>"/></dd>
                <dt class="profile-title">適切な方を選んでください。</dt>
                <dd class="profile-items">
                    <label class="form-label"><input type="radio" name="kanri_flg" value="1"/>管理者</label>
                    <label class="form-label"><input type="radio" name="kanri_flg" value="0"/>一般利用者</label>
                </dd>       
                
                

                <dt class="profile-title profile-radio">飼っているペットはなにかな？</dt>
                <dd class="profile-items">
                    <label class="form-label"><input type='radio' name="pet" value="犬">いっぬ！</label>
                    <label class="form-label"><input type='radio' name="pet" value="猫">ねっこ！</label>
                    <label class="form-label"><input type='radio' name="pet" value="その他">犬猫とかありえない！</label>
                </dd>


                <dt class="profile-title">主人名前： </dt>
                <dd class="profile-items"><input  type="text" name="name" value="<?=$result['name']?>"></dd>
                <dt class="profile-title">住所：</dt>
                <dd class="profile-items"><input type="text" name="address" value="<?=$result['address']?>"></dd>
                <dt class="profile-title">EMAIL：</dt>
                <dd class="profile-items"><input type="email" name="email" value="<?=$result['email']?>"></dd>
                <dt class="profile-title">ペットの名前：</dt>
                <dd class="profile-items"><input  type="text" name="pname" value="<?=$result['pname']?>"></dd>
                <dt class="profile-title">性別：</dt>
                <dd class="profile-items">
                    <label class="form-label"><input type='radio' name="sex" value="オス">オス</label>
                    <label class="form-label"><input type='radio' name="sex" value="メス">メス</label>
                </dd>
                <dt class="profile-title">誕生日：</dt>
                <dd class="profile-items"><input  type="date" name="birth" value="<?=$result['birth']?>">
                </dd>
                <dt class="profile-title">種類：</dt>
                <dd class="profile-items"><input type="text" name="sp" value="<?=$result['sp']?>"></dd>
                <dt class="profile-title">既往歴：</dt>
                <dd class="profile-items"><input type="text" name="mhistory" value="<?=$result['mhistory']?>"></dd>
                <dt class="profile-title">かかりつけの病院：</dt>
                <dd class="profile-items"><input type="text" name="hospital" value="<?=$result['hospital']?>"></dd>
                <dt class="profile-title">ペットの好きなものや特徴を好きに書いてね！！！</dt>
                <dd class="profile-items"><textarea name='text' id='comment'><?=$result['comment']?></textarea></dd>
                <dt class="profile-title"><label>画像を選択</label></dt>
                <dd class="profile-items"><input type="file" name="fname" accept="image/*" value="<?=$result['fname']?>"></dd>
            </dl>

            <input type='hidden' name="id" value="<?= $result['id']?>">
            <button type="submit">個人情報を修正！</button>
        </form>

        <footer class='footer'>
            <small class='copy'>&copy;Pets Form</small>
        </footer>x  
    </div>
</body>
</html>