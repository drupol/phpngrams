<?php

declare(strict_types = 1);

namespace drupol\phpngrams;

/**
 * Class AbstractNGrams
 */
abstract class AbstractNGrams
{
    use NGramsTrait;

    /**
     * {@inheritdoc}
     */
    abstract public function ngrams($data, $n);
}
