<?php
    /* SIGNUP MODULE*/
    include("./preprpr.php");//ココアちゃんぺろぺろ
    $create_uid = $_POST['uid'];

    if(!file_exists(USER_DB_PATH.$create_uid."/uname.txt")){
        $create_uname = $_POST['usname'];
        $create_pass = $_POST['pass'];

        $fp = fopen(USER_DB_PATH.$create_uid."/uname.txt","w");
        fwrite($fp , $uname);
        fclose($fp);
        //パスワードをうんちにしてから保存する
        $hash_pass = hash('sha256', $create_pass);
        $fp = fopen(USER_DB_PATH.$create_uid."/upass.txt","w");
        fwrite($fp , $hash_pass);
        fclose($fp);

        $fp = fopen(USER_DB_PATH.$create_uid."/ustatus.txt","w");
        fwrite($fp,"notauth");
        fclose($fp);
        $status = "done";
    }else{
        $status = "existed";
    }



?>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ラーニングコモンズPC席予約システム</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"data-toggle="collapse"data-target="#navi-lcreserve">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					ラーニングコモンズPC席予約システム
				</a>
			</div>
			
			<div class="collapse navbar-collapse" id="navi-lcreserve">
				<ul class="nav navbar-nav">
				</ul>
				<p class="navbar-text navbar-right"> </p>
			</div>
		</div>
	</nav>
    <div class="container">
        <h2 class="page-header">事前登録</h2>
            <?php
                if($status == "existed"){
                    print("ユーザー:".$create_uid."は存在しているため作成できません。");
                } else{
                    print("ユーザー;".$create_uid."で事前登録が完了しました。使用するためには、受付で本人確認が必要です<br>本人確認には<b>有効な学生証が必要</b>です。忘れずにお持ちください。");
                }
            ?>
        
    </div>

    