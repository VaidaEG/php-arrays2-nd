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
<p>Naudodamiesi 1 uždavinio masyvu:
a) Suskaičiuokite kiek masyve yra elementų didesnių už 10;</p>
<p>b) Raskite didžiausio elemento reikšmę;</p>
<p>c) Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y suma reikšmių turinčių indeksą 0, 1 ir t.t.)</p>
<p>d) Visus masyvus “pailginkite” iki 7 elementų</p>
<p>e) Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų
suma</p>
<?php
?>
<h1>-----------------------------------3.---------------------------------</h1>
<p>Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).</p>
<?php
$array2D = [];
$letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
$lettersLength = count($letters);
for ($i = 0; $i < 10; $i++) {
    $innerArray = [];
    for ($j = 0; $j < rand(2, 20); $j++) {
        array_push($innerArray, $letters[rand(0, $lettersLength - 1)]);
    }
    array_push($array2D, $innerArray);
}
echo '<pre>';
print_r($array2D);
echo '</pre>';
?>
<h1>-----------------------------------4.---------------------------------</h1>

<h1>-----------------------------------5.---------------------------------</h1>