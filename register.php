<style type="text/css">
 form{
    width:300px;
    background-color:#EEE0E5;
    margin-left:300px;
    margin-top:30px;
    padding:30px;
 }
 button{
    margin-top:20px;
	margin-left:10px;
	margin-right:80px;
 }
</style>
<form method="post">
<label>username:<input type="text" name="name"></label>
<br/><br/>
<label>password:<input type="password" name="pw"></label>
<br/><br/>
<label>password:<input type="password" name="repw"></label>
<button type="submit" name="submit">register</button>
<button type="return" name="return">cancel</button>
</form>

<?php 
$link = mysqli_connect('localhost', 'root', '', 'test');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}else {
	if (isset($_POST['return'])){
		echo "<script>location.href='example1.html';</script>";
	}
    if (isset($_POST['submit'])){
		if($_POST['name']==''||$_POST['pw']==''){
			echo "<script>alert('用户名或者密码不可以为空!')</script>";
		}
		$query = "select * from user where name = '{$_POST['name']}'";
        $result = mysqli_query($link, $query);
		if (mysqli_num_rows($result) == 1){
			echo "<script>alert('用户名已存在不可重复注册！')</script>";
		}
        else if ($_POST['pw'] == $_POST['repw']){
			$query = "insert into user (name,pw) values('{$_POST['name']}','{$_POST['pw']}')";
			$result=mysqli_query($link, $query);
			echo "<script>alert('注册成功！');location.href='example1.html';</script>";
        }else {
            echo "<script>alert('两次输入密码不一致！')</script>";
        }
    }
}
?>