<?php

declare(strict_types = 1);

namespace spec\drupol\phpngrams;

use drupol\phpngrams\NGramsCyclic;
use PhpSpec\ObjectBehavior;

class NGramsCyclicSpec extends ObjectBehavior
{
    public function it_can_get_ngrams()
    {
        $input = 'hello world';

        $result = [
            ['h'],
            ['e'],
            ['l'],
            ['l'],
            ['o'],
            [' '],
            ['w'],
            ['o'],
            ['r'],
            ['l'],
            ['d'],
        ];
        $this->ngrams(\str_split($input))->shouldIterateAs(new \ArrayIterator($result));
        $this->ngrams(\str_split($input))->shouldHaveCount(11);

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
        $this->ngrams(\str_split($input), 4)->shouldIterateAs(new \ArrayIterator($result));
        $this->ngrams(\str_split($input))->shouldHaveCount(11);

        $result = [
            ['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l'],
            ['e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'],
            ['l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd', 'h'],
            ['l', 'o', ' ', 'w', 'o', 'r', 'l', 'd', 'h', 'e'],
            ['o', ' ', 'w', 'o', 'r', 'l', 'd', 'h', 'e', 'l'],
            [' ', 'w', 'o', 'r', 'l', 'd', 'h', 'e', 'l', 'l'],
            ['w', 'o', 'r', 'l', 'd', 'h', 'e', 'l', 'l', 'o'],
            ['o', 'r', 'l', 'd', 'h', 'e', 'l', 'l', 'o', ' '],
            ['r', 'l', 'd', 'h', 'e', 'l', 'l', 'o', ' ', 'w'],
            ['l', 'd', 'h', 'e', 'l', 'l', 'o', ' ', 'w', 'o'],
            ['d', 'h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r'],
        ];
        $this->ngrams(\str_split($input), 10)->shouldIterateAs(new \ArrayIterator($result));
        $this->ngrams(\str_split($input))->shouldHaveCount(11);

        $result = [
            ['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'],
            ['e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd', 'h'],
            ['l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd', 'h', 'e'],
            ['l', 'o', ' ', 'w', 'o', 'r', 'l', 'd', 'h', 'e', 'l'],
            ['o', ' ', 'w', 'o', 'r', 'l', 'd', 'h', 'e', 'l', 'l'],
            [' ', 'w', 'o', 'r', 'l', 'd', 'h', 'e', 'l', 'l', 'o'],
            ['w', 'o', 'r', 'l', 'd', 'h', 'e', 'l', 'l', 'o', ' '],
            ['o', 'r', 'l', 'd', 'h', 'e', 'l', 'l', 'o', ' ', 'w'],
            ['r', 'l', 'd', 'h', 'e', 'l', 'l', 'o', ' ', 'w', 'o'],
            ['l', 'd', 'h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r'],
            ['d', 'h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l'],
        ];
        $this->ngrams(\str_split($input), 11)->shouldIterateAs(new \ArrayIterator($result));
        $this->ngrams(\str_split($input))->shouldHaveCount(11);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(NGramsCyclic::class);
    }
}
