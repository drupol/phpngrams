<?php

namespace drupol\phpngrams;

trait NGramsTrait
{
    /**
     * @param array $data
     * @param int $n
     * @param bool $cyclic
     *
     * @return array
     */
    public function ngramArray(array $data, $n = 1, $cyclic = true)
    {
        return $this->doNgram($data, $n, $cyclic);
    }

    /**
     * @param $data
     * @param int $n
     * @param bool $cyclic
     *
     * @return array
     */
    public function ngramString($data, $n = 1, $cyclic = true)
    {
        return array_map(function ($data) {
            return implode('', $data);
        }, $this->doNgram(str_split($data), $n, $cyclic));
    }

    /**
     * @param $data
     * @param $n
     * @param $cyclic
     *
     * @return array
     */
    private function doNgram($data, $n, $cyclic)
    {
        $dataLength = count($data);

        $n = $n > $dataLength ? $dataLength : $n;

        foreach ($data as $key => $token) {
            for ($i = $key; $i < $n + $key; $i++) {
                $ngrams[] = $data[$i%$dataLength];
            }
        }

        $ngrams = array_chunk($ngrams, $n);

        return (false === $cyclic ? array_slice($ngrams, 0, $dataLength - $n + 1) : $ngrams);
    }
}
