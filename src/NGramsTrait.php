<?php

declare(strict_types = 1);

namespace drupol\phpngrams;

/**
 * Trait NGramsTrait
 */
trait NGramsTrait
{
    /**
     * @var \drupol\phpngrams\NGramsInterface
     */
    private $ngrams;

    /**
     * @param \drupol\phpngrams\NGramsInterface $ngrams
     */
    public function setNgram(NGramsInterface $ngrams)
    {
        $this->ngrams = $ngrams;
    }

    /**
     * @return \drupol\phpngrams\NGramsInterface
     */
    public function getNGrams(): NGramsInterface
    {
        return $this->ngrams;
    }

    /**
     * @param \Generator $ngrams
     * @param string|array $substring
     *
     * @return float|int
     */
    public function frequency(\Generator $ngrams, $substring)
    {
        return $this->getNGrams()->frequency($ngrams, $substring);
    }

    /**
     * @param string|array $data
     * @param int $n
     *
     * @return bool|\Generator
     */
    public function ngrams($data, int $n = 1)
    {
        return $this->getNGrams()->ngrams($data, $n);
    }
}
