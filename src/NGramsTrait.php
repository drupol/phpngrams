<?php

namespace drupol\phpngrams;

trait NGramsTrait
{
    /**
     * @param array $data
     * @param int $n
     * @param bool $cyclic
     *
     * @return \Generator
     */
    public function ngramsArray(array $data, $n = 1, $cyclic = true)
    {
        return $this->doNgrams($data, $n, $cyclic);
    }

    /**
     * @param $data
     * @param int $n
     * @param bool $cyclic
     *
     * @return \Generator
     */
    public function ngramsString($data, $n = 1, $cyclic = true)
    {
        foreach ($this->doNgrams(str_split($data), $n, $cyclic) as $data) {
            yield implode('', $data);
        }
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

        for ($j = 0; $j < $length; $j++) {
            $ngrams = [];
            for ($i = $j; $i < $n + $j; $i++) {
                $ngrams[] = $data[$i%$dataLength];
            }
            yield $ngrams;
        }
    }
}
