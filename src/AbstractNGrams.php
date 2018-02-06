<?php

namespace drupol\phpngrams;

abstract class AbstractNGrams
{
    use NGramsTrait;

    abstract public function ngrams($data, $n);
}
