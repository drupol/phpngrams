<?php

namespace drupol\phpngrams;

use drupol\phpermutations\Iterators\NGrams;

trait NGramsTrait
{

    /**
     * @param \Generator $ngrams
     * @param string $substring
     *
     * @return float|int
     */
    public function frequency(\Generator $ngrams, $substring)
    {
        $ngrams = iterator_to_array($ngrams);

        return count(array_filter($ngrams, function ($n) use ($substring) {
            return $n === $substring;
        }))/count($ngrams);
    }

    /**
     * @param $data
     * @param int $n
     * @param bool $cyclic
     *
     * @return bool|\Generator
     */
    public function ngramsFactory($data, $n = 1, $cyclic = true)
    {
        $ngrams = [];

        if (is_string($data)) {
            foreach ($this->doNgrams(str_split($data), $n, $cyclic) as $item) {
                yield implode('', $item);
            }
        }

        if (is_array($data)) {
            foreach ($this->doNgrams($data, $n, $cyclic) as $item) {
                yield $item;
            }
        }

        return $ngrams;
    }

    /**
     * @param $data
     * @param $n
     * @param $cyclic
     *
     * @return \Generator
     */
    private function doNgrams($data, $n = 1, $cyclic = true)
    {
        $dataLength = count($data);
        $n = $n > $dataLength ? $dataLength : $n;
        $length = (false === $cyclic ? $dataLength - $n + 1 : $dataLength);

        $ngrams = new NGrams($data, $n);

        for ($j = 0; $j < $length; $j++) {
            yield array_slice($ngrams->current(), 0, $n);
            $ngrams->rewind();
        }
    }
}
