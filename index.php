<h1>-----------------------------------1.---------------------------------</h1>
<p>Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.</p>
<?php
$array2D = [];
for ($i = 0; $i < 10; $i++) {
    $innerArray = [];
    for ($j = 0; $j < 5; $j++) {
        array_push($innerArray, rand(5, 25));
    }
    array_push($array2D, $innerArray);
}
echo '<pre>';
print_r($array2D);
echo '</pre>';
?>
<h1>-----------------------------------2.---------------------------------</h1>
<p>Naudodamiesi 1 uždavinio masyvu:<br>
a) Suskaičiuokite kiek masyve yra elementų didesnių už 10;</p>
<?php
$biggerThan10 = 0;
foreach ($array2D as $innerArray) {
    foreach ($innerArray as $number) {
        if ($number > 10) {
            $biggerThan10++;
        }
    }
}
echo "There are $biggerThan10 elements bigger than 10 in the array.";
?>
<p>b) Raskite didžiausio elemento reikšmę;</p>
<?php
$arrayForMax = [];
foreach ($array2D as $innerArray) {
    $arrayForMax[] = max($innerArray);
}
echo 'The biggest value of all arrays is ' . max($arrayForMax) . '.';
?>
<p>c) Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y suma reikšmių turinčių indeksą 0, 1 ir t.t.)</p>
<?php
$sumOfKeyValuesArray = [];
foreach ($array2D as $innerArray) {
    foreach ($innerArray as $key => $value) {
        if (!isset($sumOfKeyValuesArray[$key])){
            $sumOfKeyValuesArray[$key] = 0;
        }
        $sumOfKeyValuesArray[$key] += $value;
    }
}
echo 'Total sum of index values:<pre>';
print_r($sumOfKeyValuesArray);
echo '</pre>';
?>
<p>d) Visus masyvus “pailginkite” iki 7 elementų</p>
<?php
// foreach ($array2D as &$innerArray) {
//     $innerArray[] = rand(5, 25);
//     $innerArray[] = rand(5, 25);

// }
foreach ($array2D as $innerArray) {
    while (count($innerArray)<7) {
        $innerArray[] = rand(5, 25);
    }
}
echo '<pre>';
print_r($array2D);
echo '</pre>';
?>
<p>e) Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų
suma</p>
<?php
$innerArraySum = [];
foreach($array2D as $innerArray) {
    $innerArraySum[] = array_sum($innerArray);
}
echo '<pre>';
print_r($innerArraySum);
echo '</pre>';
?>
<h1>-----------------------------------3.---------------------------------</h1>
<p>Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).</p>
<?php
$array2D = [];
$letters = range('A', 'Z');
$lettersLength = count($letters);
for ($i = 0; $i < 10; $i++) {
    $innerArray = [];
    $random = rand(2, 20);
    for ($j = 0; $j < $random; $j++) {
        array_push($innerArray, $letters[rand(0, $lettersLength - 1)]);
    }
    array_push($array2D, $innerArray);
    sort($array2D[$i]);
}
echo '<pre>';
print_r($array2D);
echo '</pre>';

foreach($array2D as $innerArray) {
    foreach($innerArray as $letter) {
        echo $letter . ', ';
    }
    echo '<br>';
}
// for ($i = 0; $i < count($array2D); $i++) {
//     for ($k = 0; $k < count($array2D[$i]); $k++) {
//         echo $array2D[$i][$k] . ', ';
//     }
//     echo '<br>';
// }
?>
<h1>-----------------------------------4.---------------------------------</h1>
<p>Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai
kurių masyvai trumpiausi eitų pradžioje.</p>
<?php
sort($array2D);
echo '<pre>';
print_r($array2D);
echo '</pre>';
?>
<h1>-----------------------------------5.---------------------------------</h1>
<p>Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra
masyvas [user_id => xxx, place_in_row => xxx] user_id
atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis
skaičius nuo 0 iki 100.</p>
<?php
$usersArray = [];
for ($i = 0; $i < 30; $i++) {
    $userID = rand(1, 1000000);
    while (in_array($userID, array_column($usersArray, 'user_id'))) {
        $userID = rand(1, 1000000);
    }
    $usersArray[] = ['user_id' => $userID, 'place_in_row' => rand(0, 100)];
}
echo '<pre>';
print_r($usersArray);
echo '</pre>';
?>
<h1>-----------------------------------6.---------------------------------</h1>
<p>Išrūšiuokite 5 uždavinio masyvą pagal user_id didėjančia tvarka. Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.</p>
<?php
array_multisort(array_column($usersArray, 'user_id'), SORT_ASC, $usersArray);
echo '<pre>';
print_r($usersArray);
echo '</pre>';
array_multisort(array_column($usersArray, 'place_in_row'), SORT_DESC, $usersArray);
echo '<pre>';
print_r($usersArray);
echo '</pre>';
?>
<h1>-----------------------------------7.---------------------------------</h1>
<p>Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.</p>