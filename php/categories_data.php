<?php
$i=0;
$j=0;
$styleimg_arr = [ 'ch-img-1','ch-img-2','ch-img-3','ch-img-4','ch-img-5' ];
$styleinfo_arr = ['ch-info1','ch-info2','ch-info3','ch-info4'];
$color_arr= [ '#0460b7','#ad1313','#f2ef35','#56ccf7'];
$conn = mysqli_connect('127.0.0.1', 'root', '', 'revels') or die('Error connecting to server');
$query_string = "SELECT * from rev where cat_type=1";
$result=mysqli_query($conn,$query_string) or die('Error getting category description');
while ($row=mysqli_fetch_row($result)){
    $i = ($i + 1)%4;
    $j = ($j + 1)%5;
    echo '<div class="ar1 fid">';
    echo '<h1 align="center" style="font-size: 50px;font-family:Questrial, sans-serif;font-style: normal;font-variant: normal;font-weight: 100;color:black;background-color:'.$color_arr[$i].';margin-top:10px;" class="animtrev">';
    echo $row[1];
    echo '</h1></div>';
    echo '<ul class="ch-grid ar1 fid" style="margin-top:0px;">';
    echo '<li>';
    echo '<div class="ch-item '.$styleimg_arr[$j].' ar1 fid" style="margin-top=0px;">';
    echo '<div class="'.$styleinfo_arr[$i].'">';
    echo '<p style="color:black;">';
    echo $row[5];
    echo '</p>';
    echo '<a href="../php/events.php?catid='.$row[3].'"><button align="center" class="button4 anim2rev" ><span align="center" style="font-size:20px;color:black;">Checkout Events!!!</span></button></a>';
    echo '</div>';
    echo '</div>';
    echo '</li>';
    echo '</ul>';
}
mysqli_free_result($result);
mysqli_close($conn);

?>
