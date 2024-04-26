<?php
require "../model/AyPigLatinWord.php";
require "../service/AyPigLatinWordServiceImpl.php";
require "../model/HayPigLatinWord.php";
require "../service/HayPigLatinWordServiceImpl.php";

$word = new AyPigLatinWord();
$wordService = new AyPigLatinWordServiceImpl();
$word->setSourceText("account");
$res = $wordService->translate($word);
echo "account => ".$res." ";
echo $res == "accountay, accountway" ? "OK" : "FALSE";
echo "<br>";
$word->setSourceText("glass");
$res = $wordService->translate($word);
echo "glass => ".$res." ";
echo $res == "lassgay" ? "OK" : "FALSE";
echo "<br>";
$word->setSourceText("bedroom");
$res = $wordService->translate($word);
echo "bedroom => ".$res." ";
echo $res == "edbay oomray" ? "OK" : "FALSE";
echo "<br>";


$word = new HayPigLatinWord();
$wordService = new HayPigLatinWordServiceImpl();
$word->setSourceText("account");
$res = $wordService->translate($word);
echo "account => ".$res." ";
echo $res == "ccountahay" ? "OK" : "FALSE";
echo "<br>";
$word->setSourceText("glass");
$res = $wordService->translate($word);
echo "glass => ".$res." ";
echo $res == "lassgay" ? "OK" : "FALSE";
echo "<br>";
$word->setSourceText("bedroom");
$res = $wordService->translate($word);
echo "bedroom => ".$res." ";
echo $res == "edbay oomray" ? "OK" : "FALSE";
echo "<br>";
