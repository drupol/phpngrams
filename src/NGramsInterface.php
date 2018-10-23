<?php

declare(strict_types = 1);

namespace drupol\phpngrams;

/**
 * Interface NGramsInterface
 */
interface NGramsInterface
{
    /**
     * @param \Generator $ngrams
     * @param array $substring
     *
     * @return float|int
     */
    public function frequency(\Generator $ngrams, array $substring);

    /**
     * {@inheritdoc}
     */
    public function ngrams(array $data, int $n);
}
