## PHPNgrams
[![Build Status](https://travis-ci.org/drupol/phpngrams.svg?branch=master)](https://travis-ci.org/drupol/phpngrams)
 [![Code Coverage](https://scrutinizer-ci.com/g/drupol/phpngrams/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/drupol/phpngrams/?branch=master)
 [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/drupol/phpngrams/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/drupol/phpngrams/?branch=master)


PHP N-Grams library

## Introduction

In the fields of computational linguistics and probability, an n-gram is a contiguous sequence of n items from a given sample of text or speech. The items can be phonemes, syllables, letters, words or base pairs according to the application. The n-grams typically are collected from a text or speech corpus. When the items are words, n-grams may also be called shingles.

An n-gram of size 1 is referred to as a "unigram"; size 2 is a "bigram" (or, less commonly, a "digram"); size 3 is a "trigram". Larger sizes are sometimes referred to by the value of n in modern language, e.g., "four-gram", "five-gram", and so on. (More on [Wikipedia](https://en.wikipedia.org/wiki/N-gram))

## Requirements

* PHP >= 7.0

## Installation

Include this library in your project by doing:

`composer require drupol/phpngrams`

The library provides two classes:

* NGrams
* NGramsCyclic

and one trait:

* NGramsTrait

## Usage

Let's say you want to find all the N-Gram of size 3 of the string **hello world**:

```php
$word = 'hello world';
$ngram = new \drupol\phpngrams\NGrams();
$ngrams = $ngram->ngrams($word, 3);

print_r(iterator_to_array($ngrams));
/*
    [0] => hel
    [1] => ell
    [2] => llo
    [3] => lo
    [4] => o w
    [5] =>  wo
    [6] => wor
    [7] => orl
    [8] => rld
*/
```

Instead of using a string, you may also use an array as input.

```php
$word = ['h', 'e', 'l', 'l', 'o'];
$ngram = new \drupol\phpngrams\NGramsCyclic();
$ngrams = $ngram->ngrams($word, 3);

print_r(iterator_to_array($ngrams));
/*
Array
(
    [0] => Array
        (
            [0] => h
            [1] => e
            [2] => l
        )

    [1] => Array
        (
            [0] => e
            [1] => l
            [2] => l
        )

    [2] => Array
        (
            [0] => l
            [1] => l
            [2] => o
        )

    [3] => Array
        (
            [0] => l
            [1] => o
            [2] => h
        )

    [4] => Array
        (
            [0] => o
            [1] => h
            [2] => e
        )

)
*/
```

To reduce to the maximum the memory footprint, the library returns Generators, if you want to get the complete resulting array, use [iterator_to_array()](https://secure.php.net/manual/en/function.iterator-to-array.php).

The library provides and object Ngrams and a trait NgramsTrait.
It's up to you to decide how you want to use the library.

## Tests

Every time the sources are modified, [Travis](https://travis-ci.org/drupol/phpngrams), the continuous integration
service, tests the code against those tests, this way you are aware if the changes that you are introducing are valid.

# Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
