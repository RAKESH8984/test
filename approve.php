<?
session_start();
	include('main.inc.php');
	$con = new connect_db();
	$auth = new permission('index.php');

$sql = "SELECT * FROM `member` WHERE `slno` = ".$_GET[slno]." ;";
//echo $sql;
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
if($row[m_approve]=="1")
{
	$set_value="0";
}
else {
	$set_value="1";

	}
////////


//////////

$sql3 = 'UPDATE `member` SET `m_approve` = \''.$set_value.'\'  WHERE `slno` = \''.$_GET[slno].'\' LIMIT 1;';
echo $sql3."<br>";
$result3=mysql_query($sql3);




?>
<script language="javascript">
//str = "<? $row['sname']?>";
val1='tick_mark<?=$_GET['slno']?>';
if('<?=$set_value?>' == '1')
{
//alert('a<?=$set_value?>');
	str1 = "<a href='approve.php?slno=<?=$row[slno]?>' target='iframe1'><img src='../image/tick.jpg' border='0'></a>";
}
if('<?=$set_value?>' == '0')
{
	str1 = "<a href='approve.php?slno=<?=$row[slno]?>' target='iframe1'><b>Not Approve</b></a>";
//alert('<?=$set_value?>');
}
parent.document.getElementById(val1).innerHTML = str1 ;
</script>
