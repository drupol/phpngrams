<?php

declare(strict_types = 1);

namespace drupol\phpngrams;

use drupol\phpermutations\Iterators\NGrams;

/**
 * Class AbstractNGrams
 */
abstract class AbstractNGrams implements NGramsInterface
{
    /**
     * {@inheritdoc}
     */
    abstract public function ngrams(array $data, int $n = 1);

    /**
     * {@inheritdoc}
     */
    public function frequency(\Generator $ngrams, array $substring)
    {
        $ngrams = iterator_to_array($ngrams);

        return count(
            array_filter(
                $ngrams,
                function ($n) use ($substring) {
                    return $n === $substring;
                }
            )
        )/count($ngrams);
    }

    /**
     * @param array $data
     * @param int $n
     * @param bool $cyclic
     *
     * @return bool|\Generator
     */
    protected function ngramsFactory(array $data, int $n, bool $cyclic)
    {
        foreach ($this->doNgrams($data, $n, $cyclic) as $item) {
            yield $item;
        }
    }

    /**
     * @param array $data
     * @param int $n
     * @param bool $cyclic
     *
     * @return \Generator
     */
    private function doNgrams(array $data, int $n, bool $cyclic)
    {
        $dataLength = count($data);
        $n = $n > $dataLength ? $dataLength : $n;

        $ngrams = new NGrams($data, $n);

        $length = (false == $cyclic ? $dataLength - $n + 1 : $dataLength);

        for ($j = 0; $j < $length; $j++) {
            yield array_slice($ngrams->current(), 0, $n);
            $ngrams->rewind();
        }
    }
}
