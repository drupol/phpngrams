<?php

namespace spec\drupol\phpngrams;

use drupol\phpngrams\NGramsCyclic;
use PhpSpec\ObjectBehavior;

class NGramsCyclicSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(NGramsCyclic::class);
    }

    public function it_can_get_ngram_from_a_string()
    {
        $result = [
            'he',
            'el',
            'll',
            'lo',
            'oh',
        ];

        $this->ngrams('hello', 2)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_a_string_with_big_n()
    {
        $result = [
            'hello',
            'elloh',
            'llohe',
            'lohel',
            'ohell',
        ];

        $this->ngrams('hello', 10)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array()
    {
        $result = [
            ['h', 'e'],
            ['e', 'l'],
            ['l', 'l'],
            ['l', 'o'],
            ['o', 'h'],
        ];

        $this->ngrams(['h', 'e', 'l', 'l', 'o'], 2)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array_with_cycling()
    {
        $result = [
            ['h', 'e', 'l'],
            ['e', 'l', 'l'],
            ['l', 'l', 'o'],
            ['l', 'o', ' '],
            ['o', ' ', 'w'],
            [' ', 'w', 'o'],
            ['w', 'o', 'r'],
            ['o', 'r', 'l'],
            ['r', 'l', 'd'],
            ['l', 'd', 'h'],
            ['d', 'h', 'e'],
        ];

        $this->ngrams(['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'], 3)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array_with_big_n()
    {
        $result = [
            ['h', 'e', 'l', 'l', 'o'],
            ['e', 'l', 'l', 'o', 'h'],
            ['l', 'l', 'o', 'h', 'e'],
            ['l', 'o', 'h', 'e', 'l'],
            ['o', 'h', 'e', 'l', 'l'],
        ];

        $this->ngrams(['h', 'e', 'l', 'l', 'o'], 10)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_calculate_the_frequency()
    {
        $input= 'Hold my beer';
        $ngrams = $this->getWrappedObject()->ngrams($input, 2);
        $this->frequency($ngrams, 'my')->shouldBe(1/12);

        $input= ['h', 'e', 'l', 'l', 'o'];
        $ngrams = $this->getWrappedObject()->ngrams($input, 2);
        $this->frequency($ngrams, ['l', 'l'])->shouldBe(1/5);
    }
}
