
<?php
if (isset($_POST['txtSvnr']))
{
    $svnr = $_POST['txtSvnr'];

    $firstCharacter = $svnr[0];

    if($firstCharacter!= '0'){
    $sec = $svnr[1];
    $third = $svnr[2];
    $pruef = $svnr[3];
    $gebT1 = $svnr[4];
    $gebT2 = $svnr[5];
    $gebM1 = $svnr[6];
    $gebM2 = $svnr[7];
    $gebJ1 = $svnr[8];
    $gebJ2 = $svnr[9];
    
    $pruefCalc = $firstCharacter * 3 + $sec * 7 + $third * 9 + $gebT1 * 5 + $gebT2 * 8 + $gebM1 * 4 + $gebM2 * 2 + $gebJ1 * 1 + $gebJ2 * 6;
    $pruefCalc = $pruefCalc%11;
    if(($pruefCalc != 10) && ($pruefCalc === $pruef)){
        return true;
    }
}}
return false;
?>
