<?php

declare(strict_types = 1);

namespace drupol\phpngrams;

/**
 * Class NGramsCyclic
 */
class NGramsCyclic extends AbstractNGrams
{
    /**
     * {@inheritdoc}
     */
    public function ngrams($data, $n)
    {
        return $this->ngramsFactory($data, $n, true);
    }
}
