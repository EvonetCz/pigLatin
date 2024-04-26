<?php

require_once "WordService.php";

class WordServiceImpl implements WordService
{
    const VOWELS = array('a','e','i','o','u','y');
    const COMPOUND_WORDS = array("spaceship" => ["space", "ship"], "bedroom" => ["bed", "room"],
        "skateboard" => ["skate", "board"], "rainbow" => ["rain", "bow"],
        "checkout" => ["check", "out"], "cowboy" => ["cow", "boy"],
        "blueberry" => ["blue", "berry"], "breakfast" => ["break", "fast"],
        "airport" => ["air", "port"], "barefoot" => ["bare", "foot"]);
    const COMPOUND_SPLITTER = " ";
    public function isVowelWord(string $word): bool
    {
        foreach (self::VOWELS as $vowel) {
            if (str_starts_with($word, $vowel)) {
                return true;
            }
        }
        return false;
    }

    public function isCompoundWord(string $word): bool
    {
        return array_key_exists($word, self::COMPOUND_WORDS);
    }

    public function translate(Word $word): string
    {
        $result = array();
        foreach ($word->getSourceText() as $sourceText) {
            array_push($result, $this->isCompoundWord($sourceText) ? $this->translateCompound($sourceText, $word) : $this->translateSingle($sourceText, $word));
        }
        return implode("<br>", $result);
    }

    protected function translateSingle(string $sourceText, Word $word): string
    {
        return $this->isVowelWord($sourceText) ? $this->processWord($sourceText, $word->getVowelSuffixes(), true) : $this->processWord($sourceText, $word->getConsonantSuffixes(), false);
    }

    protected function translateCompound(string $sourceText, Word $word): string
    {
        $compound_words = self::COMPOUND_WORDS[$sourceText];
        $result = array();
        foreach ($compound_words as $compound_word) {
            array_push($result, $this->translateSingle($compound_word, $word));
        }

        return implode(self::COMPOUND_SPLITTER, $result);
    }

    protected function processWord(string $sourceText, array $suffixes, bool $isVowel): string {
        $result = array();
        foreach ($suffixes as $suffix) {
            $isVowel ? $this->processVowel($result, $sourceText, $suffix) : $this->processConsonant($result, $sourceText, $suffix);
        }
        return implode(", ", $result);
    }

    protected function processVowel(array &$result, string $sourceText, string $suffix) {
        array_push($result, $sourceText.$suffix);
    }

    protected function processConsonant(array &$result, string $sourceText, string $suffix) {
        array_push($result, substr($sourceText, 1).substr($sourceText,0,1).$suffix);
    }

}