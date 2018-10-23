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
    public function ngrams(array $data, int $n = 1)
    {
        return $this->ngramsFactory($data, $n, true);
    }
}
