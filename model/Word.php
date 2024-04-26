<?php declare(strict_types = 1);

class Word
{
    private array $sourceText;
    private array $consonantSuffixes;
    private array $vowelSuffixes;

    public function __construct()
    {
        $this->sourceText = array();
        $this->consonantSuffixes = array();
        $this->vowelSuffixes = array();
    }

    public function getSourceText(): array
    {
        return $this->sourceText;
    }

    public function setSourceText($values): void
    {
        if (is_array($values)) {
            $this->sourceText = $values;
        } else {
            $this->sourceText = explode(",", $values);
        }
    }

    public function getConsonantSuffixes(): array
    {
        return $this->consonantSuffixes;
    }

    protected function pustToConsonantSuffixes(...$values) {
        $this->consonantSuffixes = array_merge($this->consonantSuffixes, $values);
    }

    public function getVowelSuffixes(): array
    {
        return $this->vowelSuffixes;
    }

    protected function pustToVowelSuffixes(...$values) {
        $this->vowelSuffixes = array_merge($this->vowelSuffixes, $values);
    }


}