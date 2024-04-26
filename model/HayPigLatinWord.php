<?php

require_once "Word.php";

class HayPigLatinWord extends Word
{
    public function __construct()
    {
        parent::__construct();

        $this->pustToConsonantSuffixes("ay");
        $this->pustToVowelSuffixes("hay");
    }

}