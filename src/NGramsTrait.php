<?php

declare(strict_types = 1);

namespace drupol\phpngrams;

/**
 * Trait NGramsTrait.
 */
trait NGramsTrait
{
    /**
     * @var \drupol\phpngrams\NGramsInterface
     */
    private $ngrams;

    /**
     * @param \Generator $ngrams
     * @param array $subset
     *
     * @return float|int
     */
    public function frequency(\Generator $ngrams, array $subset)
    {
        return $this->getNGrams()->frequency($ngrams, $subset);
    }

    /**
     * @return \drupol\phpngrams\NGramsInterface
     */
    public function getNGrams(): NGramsInterface
    {
        return $this->ngrams;
    }

    /**
     * @param array|string $data
     * @param int $n
     *
     * @return bool|\Generator
     */
    public function ngrams(array $data, int $n = 1)
    {
        return $this->getNGrams()->ngrams($data, $n);
    }

    /**
     * @param \drupol\phpngrams\NGramsInterface $ngrams
     */
    public function setNgram(NGramsInterface $ngrams)
    {
        $this->ngrams = $ngrams;
    }
}
