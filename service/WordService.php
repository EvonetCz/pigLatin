<?php

interface WordService
{
    function isVowelWord(string $word): bool;
    function isCompoundWord(string $word): bool;
    function translate(Word $word): string;
}