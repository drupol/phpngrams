<?php

namespace spec\drupol\phpngrams;

use drupol\phpngrams\NGrams;
use PhpSpec\ObjectBehavior;

class NGramsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(NGrams::class);
    }

    public function it_can_get_ngram_from_a_string()
    {
        $result = [
            'he', 'el', 'll', 'lo', 'oh'
        ];

        $this->ngramsString('hello', 2)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_a_string_with_big_n()
    {
        $result = [
            'hello', 'elloh', 'llohe', 'lohel', 'ohell'
        ];

        $this->ngramsString('hello', 10)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_a_string_without_cycling()
    {
        $result = [
            'hel', 'ell', 'llo', 'lo ', 'o w', ' wo', 'wor', 'orl', 'rld'
        ];

        $this->ngramsString('hello world', 3, false)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array()
    {
        $result = [
            ['h', 'e'], ['e','l'], ['l','l'], ['l','o'], ['o','h']
        ];

        $this->ngramsArray(['h', 'e', 'l', 'l', 'o'], 2)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array_with_big_n()
    {
        $result = [
            ['h','e','l','l','o'],
            ['e','l','l','o','h'],
            ['l','l','o','h','e'],
            ['l','o','h','e','l'],
            ['o','h','e','l','l'],
        ];

        $this->ngramsArray(['h', 'e', 'l', 'l', 'o'], 10)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array_without_cycling()
    {
        $result = [
            ['h','e','l'],
            ['e','l','l'],
            ['l','l','o'],
            ['l','o',' '],
            ['o',' ','w'],
            [' ','w','o'],
            ['w','o','r'],
            ['o','r','l'],
            ['r','l','d'],
        ];

        $this->ngramsArray(['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'], 3, false)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_calculate_the_frequency()
    {
        $input= 'Hold my beer';
        $ngrams = $this->getWrappedObject()->ngramsString($input, 2);
        $this->frequency($ngrams, 'my')->shouldBe(1/12);

        $ngrams = $this->getWrappedObject()->ngramsString($input, 16, false);
        $this->frequency($ngrams, 'Hold my beer')->shouldBe(1);
    }
}
