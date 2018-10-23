[![Latest Stable Version](https://poser.pugx.org/drupol/phpngrams/v/stable)](https://packagist.org/packages/drupol/phpngrams)
 [![Total Downloads](https://poser.pugx.org/drupol/phpngrams/downloads)](https://packagist.org/packages/drupol/phpngrams)
 [![Build Status](https://travis-ci.org/drupol/phpngrams.svg?branch=master)](https://travis-ci.org/drupol/phpngrams)
 [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/drupol/phpngrams/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/drupol/phpngrams/?branch=master)
 [![Code Coverage](https://scrutinizer-ci.com/g/drupol/phpngrams/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/drupol/phpngrams/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/phpngrams/master)](https://stryker-mutator.github.io)
 [![License](https://poser.pugx.org/drupol/phpngrams/license)](https://packagist.org/packages/drupol/phpngrams)

## PHPNgrams

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

## API

Find the complete API documentation at [https://not-a-number.io/phpngrams](https://not-a-number.io/phpngrams).

## Code quality and tests

Every time changes are introduced into the library, [Travis CI](https://travis-ci.org/drupol/phpngrams/builds) run the tests.

The library has tests written with [PHPSpec](http://www.phpspec.net/).

Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

[PHPInfection](https://github.com/infection/infection) is used to ensure that your code is properly tested, run `composer infection` to test your code.

# Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
