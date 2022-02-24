<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<header>
<!-- <button class="btn-trigger">
    <svg viewBox="0 0 44 44" xmlns:xlink="http://www.w3.org/1999/xlink" role="img" aria-labelledby="menuButtonTitle">
        <title id="menuButtonTitle">Menu</title>
        <symbol id="bar">
        <rect width="28" height="2" fill="#f0f0f0"></rect>
        </symbol>
        <use xlink:href="#bar" x="8" y="14"></use>
        <use xlink:href="#bar" x="8" y="24"></use>
        <use xlink:href="#bar" x="8" y="34"></use>
    </svg>
</button> -->
<nav class="navbar">
    <div class="container-fluid">
        <di class="navbar-header">
            <div class="navbar-header"><a class="navbar-brand" href="log.php">記録一覧</a></div>
            <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
            <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
        </di>
    </div>
    
</nav>

<div class='prof'>
    <div class='prof__img'><img src='img/2_Precious_Pets_2-1.jpg'alt=''></div>
    <div class='prfo__contents'>
        <div class='prof__name'>Pets Healthy Log</div>
        <div class='prof__text'><?php echo $message; ?></div>
    </div>
</div>
</header>

</body>
</html>