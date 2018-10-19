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

    public function it_can_get_ngram_from_an_array_without_cycling()
    {
        $result = [
            ['h', 'e', 'l', 'l'],
            ['e', 'l', 'l', 'o'],
            ['l', 'l', 'o', ' '],
            ['l', 'o', ' ', 'w'],
            ['o', ' ', 'w', 'o'],
            [' ', 'w', 'o', 'r'],
            ['w', 'o', 'r', 'l'],
            ['o', 'r', 'l', 'd'],
            ['r', 'l', 'd', 'h'],
            ['l', 'd', 'h', 'e'],
            ['d', 'h', 'e', 'l'],
        ];

        $this->ngrams(['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'], 4)->shouldIterateAs(new \ArrayIterator($result));
    }
}
