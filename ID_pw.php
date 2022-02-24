


<?php
$message = date('Y/m/d/l');

session_start();

//1.  DB接続します
require_once('funcs.php');




?>

<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pets form</title>
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel='stylesheet' href='css/reset.css'>
    <link rel='stylesheet' href='css/style.css'>
</head>



<body>
    <div class='wrap'>
        <div class='prof'>
            <div class='prof__img'><img src='img/2_Precious_Pets_2-1.jpg'alt=''></div>
            <div class='prfo__contents'>
                <div class='prof__name'>ID登録</div>
                <div class='prof__text'><?php echo $message; ?></div>
            </div>
        </div>
        <!-- /.prof -->

        <div class='contents'>
            <div class='title'>個人情報</div>
            <div class='text'>
                IDとPW、そして個人の情報を入力してください。<br>
                「あなたの名前」「住所」「emailアドレス」「ペットの名前」「種名」を入力してください！<br>
                例）「太郎」「北海道」「＊＊＊＠test.ts」「ケン」「チワワ」
                <p style="color:red;">※注意　ログイン後変更できますが、ログインまでは変更できません。IDとPWを忘れずに！</p>
            </div>
        </div>
        <!-- /.contents -->

        <form action='insert1.php' method="post" enctype="multipart/form-data">

            <dl class ='profile-list'>
                <dt class="profile-title">ID:</dt>
                <dd class="profile-items"><input type="text" name="lid" /></dd>
                <dt class="profile-title">PW:</dt>
                <dd class="profile-items"><input type="password" name="lpw"/></dd>
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
                <dd class="profile-items"><input  type="text" name="name"></dd>
                <dt class="profile-title">住所：</dt>
                <dd class="profile-items"><input type="text" name="address"></dd>
                <dt class="profile-title">EMAIL：</dt>
                <dd class="profile-items"><input type="email" name="email"></dd>
                <dt class="profile-title">ペットの名前：</dt>
                <dd class="profile-items"><input  type="text" name="pname" value='<?=$name?>'></dd>
                <dt class="profile-title">性別：</dt>
                <dd class="profile-items">
                    <label class="form-label"><input type='radio' name="sex" value="オス">オス</label>
                    <label class="form-label"><input type='radio' name="sex" value="メス">メス</label>
                </dd>
                <dt class="profile-title">誕生日：</dt>
                <dd class="profile-items"><input  type="date" name="birth" value="2010-01-01">
                </dd>
                <dt class="profile-title">種類：</dt>
                <dd class="profile-items"><input type="text" name="sp"></dd>
                <dt class="profile-title">既往歴：</dt>
                <dd class="profile-items"><input type="text" name="mhistory"></dd>
                <dt class="profile-title">かかりつけの病院：</dt>
                <dd class="profile-items"><input type="text" name="hospital"></dd>
                <dt class="profile-title">ペットの好きなものや特徴を好きに書いてね！！！</dt>
                <dd class="profile-items"><textarea name='text' id='comment'></textarea></dd>
                <dt class="profile-title"><label>画像を選択</label></dt>
                <dd class="profile-items"><input type="file" name="fname" accept="image/*"required></dd>
            </dl>

            <button type="submit">個人情報を送信！</button>
        </form>

        <footer class='footer'>
            <small class='copy'>&copy;Pets Form</small>
        </footer>
    </div>
    
</body>
</html>