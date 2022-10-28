<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-color: white;
}
.box{
	float: left;
	margin-left: 5%;
	text-align: left;
}
</style>
</head>
<body>
<div style="background-color: mintcream;width:800px; height:600px; padding:20px; margin-left: 15%;text-align:center; border: 10px solid teal">
<div style="width:750px; height:550px; padding:20px;text-align:center; border: 5px solid teal">
 <span style="font-size:50px; font-weight:bold">End Semester Certificate</span>
       <br><br><br>
       <span><i>This is to certify that</i></span>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname="trial";
$port = "3307";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$name = $_POST["name"];
$rno = $_POST["rno"];
$pno = $_POST["pno"];
$add = $_POST["add"];
$m1 = $_POST["m1"];
$m2 = $_POST["m2"];
$m3 = $_POST["m3"];
$m4 = $_POST["m4"];
$m5 = $_POST["m5"];
$m6 = $_POST["m6"];
$percent = (($m1+$m2+$m3+$m4+$m5+$m6)/600)*100;

echo "<i><b>$name,</b> Roll Number: <b>$rno,</b> of </i>";
$course = $_POST["course"];
if ($course == "BID")
{
echo "<i><b>BID</b> course"," has successfully <b>passed </b>the semester.<br><br></i><BR>";
}
else if ($course == "BBE")
{
echo "<i><b>BBE</b> course"," has successfully <b>passed </b>the semester.<br><br></i><BR>";
}
else if ($course == "BBT")
{
echo "<i><b>BBT</b> course"," has successfully <b>passed </b>the semester.<br><br></i><BR>";
}
else if ($course == "BMI")
{
echo "<i><b>BMI</b> course"," has successfully <b>passed </b>the semester.<br><br></i><BR>";
}
else if ($course == "BFT")
{
echo "<i><b>BBT</b> course","has successfully <b>passed </b>the semester.<br><br></i><BR>";
}
?>
<div class="box">
<?php
echo "<b>Details:<br>Roll number:</b> ", "$rno", "<BR>";
echo "<b>Phone number:</b> ", "$pno", "<BR>";
echo "<b>Address: </b>", "$add", "<br>";
if (!empty($_POST["favsub"]))
{
echo "<br><b>Favourite subjects: </b><br>";
foreach($_POST["favsub"] as $selected)
{
echo "",$selected,"<br>";
}
}
echo "<br><b>Extracurricular Activities:</b><br>";
foreach($_POST["activity"] as $select)
{
echo "".$select,"<br>";
}
?>
</div>
<img src="medal.png" style=" margin-right: 10%;float: right; width: 150px; height: 230px;"><br><br>
<div class="box">
<?php 
echo "<br><b>Your Scores in 6 subjects: <br><br></b>";
echo "Mathematics: ", "<b>$m1</b>";
echo ", Computer Science: ", "<b>$m2</b>";
echo ", Physics: ", "<b>$m3</b>";
echo ", Chemistry: ", "<b>$m4</b>";
echo ", Practical I: ", "<b>$m5</b>";
echo ", Practical II: ", "<b>$m6</b>", "<BR>";
?>
</div>
<div class="box">
<?php
if ($percent >= 90)
{
	echo "<br><i>Has passed Board examinations with overall percentage score of ", "<b>$percent", " %<BR></b></i>";
    echo "<b>Distinction class has been awarded</b> ";
}
else if ($percent >= 70 && $percent < 90)
{
	echo "<BR><i>Has passed Board examinations with overall percentage score of ", "<b>$percent", " %<BR></b></i>";
    echo "<b>First class has been awarded</b> ";
}
else if ($percent >=50 && $percent <70)
{
	echo "<BR><i>Has passed Board examinations with overall percentage score of ", "<b>$percent", " %<BR></b></i>";
    echo "<b>Second class has been awarded</b> ";
}
else if ($percent >=40 && $percent < 50)
{
	echo "<BR><i>Has passed Board examinations with overall percentage score of ", "<b>$percent", " %<BR></b></i>";
    echo "<b>Pass class has been awarded</b> ";
}
else
{
	echo "<BR><i>Has failed Board examinations with overall percentage score of ", "<b>$percent", " %<BR></b></i>";
    echo "<b>No class has been awarded</b> ";
}
$sql1 = "create table student(name varchar(20),rno varchar(20), pno varchar(10), percent double)";
$conn->query($sql1);
$sql2 = "insert into student values('$name', '$rno', '$pno', $percent)";
$conn->query($sql2);
$conn->close();
?>
</div>
</div>
</div>
</body>
</html> 