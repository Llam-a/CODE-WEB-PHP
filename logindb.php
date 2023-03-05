$host="localhost";

$username="root";

$db_name="ssndb";

$tbls_name="Llama";

$conn = mysql-connect("$host", "$username", "$password")or die("cannot connect");

mysql_select_sb("$db_name")or die("cannot select DB);

$myusername=$_POST['ust'];

$mypassword=$_POST['pwd'];

$myusername = stripslashes($myusername)

$mypassword =  stripslashes($mypassword)

$myusername = mysql_real_escape_string($myusername);

$mypassword = mysql_real_escape_string($mypassword);

$sql="select * form $tbl_name where passwd='$mypassword' AND name='$myusername'";

$result=mysql_query($sql,$conn);

$count=mysql-num-rows($result);

if ($count ==1)
{

echo ":) :) LOGIN SUCCESS :) :) ";
}

else

{
echo ":( :( AUTHENTICATION FALIURE :( :( ";
}
