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
<?php
foreach ($usersArray as &$user) {
        $user['name'] = '';
        $user['surname'] = '';
        $letters = range('a', 'z');
        $lettersLength = count($letters);
        $nameLength = rand(5, 15);
        $surnameLength = rand(5, 15);
        for ($i = 0; $i < $nameLength; $i++) {
            if ($i === 0) {
                $user['name'] .= strtoupper($letters[rand(0, $lettersLength - 1)]);
            }
            $user['name'] .= $letters[rand(0, $lettersLength - 1)];
        }
        for ($i = 0; $i < $surnameLength; $i++) {
            if ($i === 0) {
                $user['surname'] .= strtoupper($letters[rand(0, $lettersLength - 1)]);
            }
            $user['surname'] .= $letters[rand(0, $lettersLength - 1)];
        }
    }
unset($user);
echo '<pre>';
print_r($usersArray);
echo '</pre>';
?>
<h1>-----------------------------------8.---------------------------------</h1>
<p>Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: generuokite skaičių nuo 0 iki 5. Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.</p>
<?php
$array = [];
for ($i = 0; $i < 10; $i++) {
    $random = rand(0, 5);
    $innerArray = [];
    if ($random === 0) {
        $array[$i] =  rand(0, 10);
    } else {
        for ($j = 0; $j < $random; $j++) {
            $innerArray[$j] = rand(0, 10);
        }
        $array[$i] =  $innerArray;
    }
}
echo '<pre>';
print_r($array);
echo '</pre>';
?>
<h1>-----------------------------------9.---------------------------------</h1>
<p>Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.</p>
<?php
$sum = 0;
foreach ($array as $value) {
    if (is_array($value)) {
        $sum += array_sum($value); 
    } else {
        $sum += $value; 
    }
}
echo "Sum of all array values is: $sum.";
?>
<h1>-----------------------------------10.---------------------------------</h1>
<p>Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@裡, o reikšmė color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvų atspausdinkite “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.</p>
<?php
$array10 = [];
$values = '#%+*@裡';
$valuesLength = mb_strlen($values);
for ($i = 0; $i < 10; $i++) {
    $array10Inner = [];
    for ($j = 0; $j < 10; $j++) {
        $value = $values[rand(0, $valuesLength - 1)];
        $color = '#' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $array10Inner[$j] = ['value' => $value, 'color' => $color];
    }
    $array10[$i] = $array10Inner;
}
echo '<pre>';
print_r($array10);
echo '</pre>';
?>
<h1>-----------------------------------11.---------------------------------</h1>
<p>Duotas kodas, generuojantis masyvą.
Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich,
()?:)
NEGALIMA! naudoti jokių regex ir string funkcijų.
GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis
funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php
Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet
sprendimo pagrindas turi būti matematinis.
Atsakymą reikia pateikti formatu:
echo '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123
- '.$sk2.' kartų.</h3>';
Kur rudi skaičiai yra pakeisti skaičiais $a ir $b generuojamais kodo.</p>
<?php
do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
   } while ($a == $b);
   $long = rand(10,30);
   $sk1 = $sk2 = 0;
   echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
   $c = [];
   for ($i=0; $i<$long; $i++) {
       // pick one or more random keys out of an array
       // keys from arrays become values and values from array become keys
    $c[] = array_rand(array_flip([$a, $b]));
   }
   echo '<h4>Masyvas:</h4>';
   echo '<pre>';
   print_r($c);
   echo '</pre>';
   // sprendimas
   $arraySum = array_sum($c);
   $iterations = count($c);

?>