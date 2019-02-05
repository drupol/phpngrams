<?php

declare(strict_types = 1);

namespace spec\drupol\phpngrams;

use drupol\phpngrams\NGrams;
use PhpSpec\ObjectBehavior;

class NGramsSpec extends ObjectBehavior
{
    public function it_can_calculate_the_frequency()
    {
        $input = 'Hold my beer';
        $ngrams = $this->getWrappedObject()->ngrams(\str_split($input), 2);
        $this->frequency($ngrams, \str_split('my'))->shouldBe(1 / 11);

        $input = 'hello';
        $ngrams = $this->getWrappedObject()->ngrams(\str_split($input), 2);
        $this->frequency($ngrams, ['l', 'l'])->shouldBe(1 / 4);

        $input = '0123456789';
        $ngrams = $this->getWrappedObject()->ngrams(\str_split($input), 2);
        $this->frequency($ngrams, [0, 1])->shouldBe(0);

        $ngrams = $this->getWrappedObject()->ngrams(\str_split($input), 2);
        $this->frequency($ngrams, ['0', '1'])->shouldBe(1 / 9);
    }

    public function it_can_get_ngram_from_a_string()
    {
        $result = [
            \str_split('h'),
            \str_split('e'),
            \str_split('l'),
            \str_split('l'),
            \str_split('o'),
        ];

        $this->ngrams(\str_split('hello'))->shouldIterateAs(new \ArrayIterator($result));
        $this->ngrams(\str_split('hello'))->shouldHaveCount(5);

        $result = [
            \str_split('he'),
            \str_split('el'),
            \str_split('ll'),
            \str_split('lo'),
        ];

        $this->ngrams(\str_split('hello'), 2)->shouldIterateAs(new \ArrayIterator($result));
        $this->ngrams(\str_split('hello'), 2)->shouldHaveCount(4);
    }

    public function it_can_get_ngram_from_a_string_with_big_n()
    {
        $result = [
            \str_split('hello'),
        ];

        $this->ngrams(\str_split('hello'), 10)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array()
    {
        $result = [
            ['h', 'e'],
            ['e', 'l'],
            ['l', 'l'],
            ['l', 'o'],
        ];

        $this->ngrams(['h', 'e', 'l', 'l', 'o'], 2)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array_with_big_n()
    {
        $result = [
            ['h', 'e', 'l', 'l', 'o'],
        ];

        $this->ngrams(['h', 'e', 'l', 'l', 'o'], 10)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_can_get_ngram_from_an_array_without_cycling()
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
        ];

        $this->ngrams(['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'], 3)->shouldIterateAs(new \ArrayIterator($result));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(NGrams::class);
    }
}
