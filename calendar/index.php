<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>


<?php 
// sunday = 1
// monday = 2
// tuesday = 3
// wednesday = 4
// thursday = 5
// friday = 6
// saturday = 7

// $time = strtotime("1 January 2022"), "\n";

$defaultYear = 2022;
$defaultMonth = 1;
$d=cal_days_in_month(CAL_GREGORIAN,$defaultMonth,$defaultYear);
$daysInCurrentMonth = date('t');
echo $daysInCurrentMonth;
// echo "There was $d days in jan 2022";

$rowLength = 7;
$colLength = 1;
$currentDate = 1;
// $colLength = 5;

$str = '1 January 2022';

$timestamp = strtotime($str);
$firstDay = date('l', $timestamp);
$fillerDays = 0;
$daysFirstWeek = 0;

if ($firstDay == 'Sunday') {
    $fillerDays = 0;
    $daysFirstWeek = 7;
} elseif ($firstDay == 'Monday') {
    $fillerDays = 1;
    $daysFirstWeek = 6;
} elseif ($firstDay == 'Tuesday') {
    $fillerDays = 2;
    $daysFirstWeek = 5;
} elseif ($firstDay == 'Wednesday') {
    $fillerDays = 3;
    $daysFirstWeek = 4;
} elseif ($firstDay == 'Thursday') {
    $fillerDays = 4;
    $daysFirstWeek = 3;
} elseif ($firstDay == 'Friday') {
    $fillerDays = 5;
    $daysFirstWeek = 2;
} elseif ($firstDay == 'Saturday') {
    $fillerDays = 6;
    $daysFirstWeek = 1;
}


if ($fillerDays !== 0) {
?>
    <div class="container">

    <?php
    for ($x = 0; $x < $fillerDays; $x++) {
        
    ?>
    <div class='fillersubDiv'>
        <br>
        <br>
        <br>
        <p></p>
        </div>
    <!-- <div class='gridParent'> -->
    
    
    
    
    <?php 
    
    } 
    for ($y = 0; $y < $daysFirstWeek; $y++) {
        
?>
<div class="subDiv">
<?php
echo $currentDate;
?>
</div>


<?php
$currentDate++;
    }
        
    
    ?>
    
    

</div>
    <?php
        
    }

    ?>


<?php

if(isset($_POST['forward'])){

    
    
        $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
        $nLine = "\n";
        fwrite($myfile, 'forward' . $nLine);
        fclose($myfile);
    

} elseif (isset($_POST['backward'])){

    $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
    $nLine = "\n";
    fwrite($myfile, 'backward' . $nLine);
    fclose($myfile);


}
// $subDivNum = 1;

?>


    
<?php



for ($n = 0; $n < $colLength; $n++) {
    if ($currentDate < $daysInCurrentMonth) {
        $colLength++;
?>
<!-- <div class='gridParent'> -->
<div class="container">



<?php 

for ($i = 0; $i < 7; $i++){
if ($currentDate < $daysInCurrentMonth) {
    
?>

<div class='subDiv'>
<p>
<?php
echo $currentDate;
?>
</p>

<form method="POST">
<input type='submit' name='forward' value='Forward'>
<input type='submit' name='backward' value='Backward'>

</form>

</div>


<?php

} else {
    break;
}
?>


<?php
if ($currentDate < $daysInCurrentMonth) {
$currentDate++;
}
}




?>

<!-- </div> -->

</div>

        <?php
    }
?>


<?php

}

?>

</body>
</html>