<?php declare(strict_types = 1);

require_once "WordServiceImpl.php";
require_once "WordService.php";
class HayPigLatinWordServiceImpl extends WordServiceImpl implements WordService
{
    protected function processVowel(array &$result, string $sourceText, string $suffix) {
        array_push($result, substr($sourceText, 1).substr($sourceText,0,1).$suffix);
    }
}