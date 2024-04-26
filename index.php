<html>

<form onsubmit="process" method="post">
    <input type="text" style="width:800px" name="sourceText" placeholder="zadejte slova k překladu oddělená čárkou">
    <input type="submit" value="Odeslat">
</form>
<?php

if (!empty($_POST["sourceText"])) {
    require "model/AyPigLatinWord.php";
    require "service/AyPigLatinWordServiceImpl.php";
    require "model/HayPigLatinWord.php";
    require "service/HayPigLatinWordServiceImpl.php";

    echo "<b>Zadaná slova:</b> ".$_POST["sourceText"];

    echo "<br><br><b>Varianta Ay:</b><br>";
    $word = new AyPigLatinWord();
    $word->setSourceText($_POST["sourceText"]);

    $wordService = new AyPigLatinWordServiceImpl();
    echo $wordService->translate($word);

    echo "<br><br><b>Varianta Hay:</b><br>";
    $word = new HayPigLatinWord();
    $word->setSourceText($_POST["sourceText"]);

    $wordService = new HayPigLatinWordServiceImpl();
    echo $wordService->translate($word);


}


?>

</html>
