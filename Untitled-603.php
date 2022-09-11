<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>發文</title>
<link href="form_style.css" rel="stylesheet" type="text/css">
<link href="table_style.css" rel="stylesheet" type="text/css">
<script src="js/myvalidate.js"></script>
</head>

<body>
<h1>討論區</h1>

<h1 id="myH1"><a href="Untitled-103.html"><img src="images/maydayintroduce03.jpg"></a>

<?php
	$link = @mysqli_connect('localhost', '105jsa10', '105jsa10', '105jsa10');
	
	if ($link === false) {
		echo '連結錯誤代碼： ' . mysqli_connect_errno() . '<br>';
		echo '連結錯誤訊息： ' . mysqli_connect_error() . '<br>';
		die();
	}
	
	mysqli_query($link, 'set names utf8');

	$empty = false;
	if (isset($_POST['submit']))
	{
		if ($_POST['nickname'] == "" || $_POST['content'] == "")
		{
			$empty = true;
		} else
		{
			$sql = "insert into topic (content, nickname, time) value ('{$_POST['content']}', '{$_POST['nickname']}', now())";
			$result = mysqli_query($link, $sql);
			if ($result === false)
			{
				echo "insert 失敗";
			}
		}
	}

	echo '<table cellspacing="0">';
	echo '<tr><th>ID</th><th>匿稱</th><th>發言</th><th>時間</th></tr>';
	$sql = 'select * from topic';
	$result = mysqli_query($link, $sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' . $row['topicID'] . '</td>' . '<td>' . $row['nickname'] . '</td>' . '<td>' . $row['content'] . '</td> ' . '<td>' . $row['time'] . '</td>';
		echo '</tr>';
	}
	
	echo '</table>';	
		
	mysqli_free_result($result);
	
	mysqli_close($link);
?>

<br>
<form class="elegant-aero" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
	<label for="nickname">
	<span>匿稱:</span><input type="text" id="nickname" name="nickname">
	</label>
	<label for="message">
	<span>發言:</span><textarea id="message" name="content"></textarea>
	</label>
	<label>
	<span>&nbsp;</span>
	<input type="submit" name="submit" value="發送">
	</label>
</form>

<?php
	if ($empty == true)
	{
		echo '<p style="color:red;text-align:center">沒有填寫匿稱或發文</p>';
	}
?>

</body>
</html>