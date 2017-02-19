<?php
$i=0;
$j=0;
$styleimg_arr = [ 'ch-img-1','ch-img-2','ch-img-3','ch-img-4','ch-img-5','ch-img-6','ch-img-7','ch-img-8' ];
$styleinfo_arr = ['ch-info1','ch-info2','ch-info3','ch-info4'];
$color_arr= [ '#56ccf7','#ad1313','#f2ef35','#0460b7'];
if(isset($_GET['catid']))
    $catid=$_GET['catid'];
else
    $catid='2';
$conn = mysqli_connect('127.0.0.1', 'root', '', 'revels') or die('Error connecting to server');
$query1_string = "SELECT * from events where cat_id=".mysqli_escape_string($conn,$catid);
$query2_string = "SELECT cat_name from rev where cat_id=".mysqli_escape_string($conn,$catid);

$result=mysqli_query($conn, $query2_string) or die('Error querying database');
echo '<h1 align="center" style="font-size: 50px;font-family: Questrial, sans-serif;font-style: normal;font-variant: normal;font-weight: 100;color:black;background-color:'.$color_arr[3].';margin-top:10px;" class="animtrev">';
echo $result->fetch_object()->cat_name;
echo '</h1>';
mysqli_free_result($result);

$result=mysqli_query($conn,$query1_string) or die('Error getting events description');
while ($row=mysqli_fetch_row($result)){
    $i=($i+1)%4;
    $j=($j+1)%8;
    echo '<ul class="ch-grid ar1 fid" style="margin-top:0px;"><li><div class="ch-item '.$styleimg_arr[$j].' ar1 fid" style="margin-top=0px;"><div class="ch-info1">';
    echo '<h3 style="color:black;">';
    echo $row[3];
    echo '</h3>';
    echo '<p style="color:black;">';
    echo $row[5];
    echo '</p>';
    echo '</div>';
    echo '</div>';
    echo '</li>';
    echo '<br>';
    echo '<br>';
    echo '</ul>';
}
mysqli_free_result($result);
mysqli_close($conn);

?>
