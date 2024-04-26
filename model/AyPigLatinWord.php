<?php

require_once "Word.php";

class AyPigLatinWord extends Word
{
    public function __construct()
    {
        parent::__construct();

        $this->pustToConsonantSuffixes("ay");
        $this->pustToVowelSuffixes("ay", "way");
    }

}