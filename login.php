<?php
$link = mysqli_connect('localhost', 'root', '', 'test');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
	if (isset($_POST['return'])){
		echo "<script>location.href='page1.html';</script>";
	}
    if (isset($_POST['submit'])){
        $query = "select * from user where name = '{$_POST['name']}' and pw = '{$_POST['pw']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
			echo "<script>alert('登陆成功！');location.href='page1.html';</script>";
        }
		else{
			 echo "<script>alert('用户名不存在，请注册！');location.href='page1.html';</script>";
		}
    }
}
?>

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
<button type="submit" name="submit">login</button>
<button type="return" name="return">cancel</button>
</form>


