<?php

class Euler extends Math {

    /**
     * @title - Multiples of 3 and 5
     * If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9.
     * The sum of these multiples is 23. Find the sum of all the multiples of 3 or 5 below 1000.
     */
    public function problem_1()
    {
        for($i = 1; $i < 1000; $i++) {
            if($this->isEvenlyDivisible($dividend = $i, $divisor = 3) || $this->isEvenlyDivisible($dividend = $i, $divisor = 5)) {
                isset($solution) ? $solution += $i : $solution = $i;
            }
        }
        return $solution;
    }

    /**
     * @title - Even Fibonacci numbers
     * Each new term in the Fibonacci sequence is generated by adding the previous two terms. By starting with 1 and 2, the first 10 terms will be:
     * 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ...
     * By considering the terms in the Fibonacci sequence whose values do not exceed four million, find the sum of the even-valued terms.
     */
    public function problem_2()
    {
        $limit = 4000000;
        $last = 1;
        $current = 2;

        while(true) {
            if($this->isEvenlyDivisible($dividend = $current, $divisor = 2)) {
                isset($solution) ? $solution += $current : $solution = $current;
            }

            $old = $last;
            $last = $current;
            $current = $old + $current;

            if($current > $limit) {
                break;
            }
        }
        return $solution;
    }

    /**
     * @title - Largest prime factor
     * The prime factors of 13195 are 5, 7, 13 and 29.
     * What is the largest prime factor of the number 600851475143 ?
     */
    public function problem_3()
    {
        $nr = 600851475143;
        # Sieve of Eratosthenes
        $primeSieve = array_flip(array(2=>-1) + $this->sieve(10000));
        foreach($primeSieve as $ps) {
            if(bcmod($nr,$ps) == 0) {
                $solution = $ps;
            }
        }
        return $solution;
    }

    /**
     * @title - Largest palindrome product
     * A palindromic number reads the same both ways. The largest palindrome
     * made from the product of two 2-digit numbers is 9009 = 91 × 99.
     * Find the largest palindrome made from the product of two 3-digit numbers.
     */
    public function problem_4()
    {
        for($i = 999; $i > 800; $i--) {
            for($j = 999; $j > 800; $j--) {
                $p = $i * $j;

                if(substr($p,0,3) == strrev(substr($p,-3))) {
                    $solution[] = $p;
                }
            }
        }

        sort($solution);
        return end($solution);
    }

    /**
     * @title - Smallest multiple
     * 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.
     * What is the smallest number that is evenly divisible by all of the numbers from 1 to 20?
     */
    public function problem_5(&$solution = 2520)
    {
        $allEvenlyDivisible = true;
        for($k=11;$k<=20;$k++) {
            if(!$this->isEvenlyDivisible($solution,$k)) {
                $allEvenlyDivisible = false;
                break;
            }
        }

        if($allEvenlyDivisible) {
            return $solution;
        }

        $solution += 2520;
        return $this->problem_5($solution);
    }


    /**
     * @title - Sum square difference
     * The sum of the squares of the first ten natural numbers is, 1^(2) + 2^(2) + ... + 10^(2) = 385
     * The square of the sum of the first ten natural numbers is, (1 + 2 + ... + 10)^(2) = 55^(2) = 3025
     * Hence the difference between the sum of the squares of the first ten natural numbers and
     * the square of the sum is 3025 - 385 = 2640.
     * Find the difference between the sum of the squares of the first one hundred natural numbers and
     * the square of the sum.
     */
    public function problem_6()
    {
        $power = 2;
        $numbers = 100;
        $sumSquare = $squareSum = 0;
        for($i=1;$i<=$numbers;$i++){
            $sumSquare += pow($i,$power);
            $squareSum += $i;
        }

        return pow($squareSum,$power) - $sumSquare;
    }

    /**
     * @title - 10001st prime
     * By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6^(th) prime is 13.
     * What is the 10001^(st) prime number?
     */
    public function problem_7()
    {
        $primeSieve = array_flip(array(2=>-1) + $this->sieve(110000));
        sort($primeSieve);
        return $primeSieve[10000];
    }

    /**
     * @title - Largest product in a series
     * Find the greatest product of five consecutive digits in the 1000-digit number.
     * 73167176531330624919225119674426574742355349194934
     * 96983520312774506326239578318016984801869478851843
     * 85861560789112949495459501737958331952853208805511
     * 12540698747158523863050715693290963295227443043557
     * 66896648950445244523161731856403098711121722383113
     * 62229893423380308135336276614282806444486645238749
     * 30358907296290491560440772390713810515859307960866
     * 70172427121883998797908792274921901699720888093776
     * 65727333001053367881220235421809751254540594752243
     * 52584907711670556013604839586446706324415722155397
     * 53697817977846174064955149290862569321978468622482
     * 83972241375657056057490261407972968652414535100474
     * 82166370484403199890008895243450658541227588666881
     * 16427171479924442928230863465674813919123162824586
     * 17866458359124566529476545682848912883142607690042
     * 24219022671055626321111109370544217506941658960408
     * 07198403850962455444362981230987879927244284909188
     * 84580156166097919133875499200524063689912560717606
     * 05886116467109405077541002256983155200055935729725
     * 71636269561882670428252483600823257530420752963450
     */
    public function problem_8()
    {
        $arr = [
            '73167176531330624919225119674426574742355349194934',
            '96983520312774506326239578318016984801869478851843',
            '85861560789112949495459501737958331952853208805511',
            '12540698747158523863050715693290963295227443043557',
            '66896648950445244523161731856403098711121722383113',
            '62229893423380308135336276614282806444486645238749',
            '30358907296290491560440772390713810515859307960866',
            '70172427121883998797908792274921901699720888093776',
            '65727333001053367881220235421809751254540594752243',
            '52584907711670556013604839586446706324415722155397',
            '53697817977846174064955149290862569321978468622482',
            '83972241375657056057490261407972968652414535100474',
            '82166370484403199890008895243450658541227588666881',
            '16427171479924442928230863465674813919123162824586',
            '17866458359124566529476545682848912883142607690042',
            '24219022671055626321111109370544217506941658960408',
            '07198403850962455444362981230987879927244284909188',
            '84580156166097919133875499200524063689912560717606',
            '05886116467109405077541002256983155200055935729725',
            '71636269561882670428252483600823257530420752963450',
        ];
        $n = implode('',$arr);
        $max = strlen($n) - 5; $solution = 0;
        for($i=0;$i<=$max;$i++) {
            $solution = max($solution,$n[$i] * $n[$i+1] * $n[$i+2] * $n[$i+3] * $n[$i+4]);
        }

        return $solution;
    }

    /**
     * @title - Special Pythagorean triplet
     * A Pythagorean triplet is a set of three natural numbers, a  < b  < c, for which,
     * a^(2) + b^(2) = c^(2)
     * For example, 3^(2) + 4^(2) = 9 + 16 = 25 = 5^(2).
     * There exists exactly one Pythagorean triplet for which a + b + c = 1000. Find the product abc.
     */
    public function problem_9()
    {
        for($c = 500; $c > 1; $c--){
            for($b = ($c-1); $b > 1; $b--){
                $a = 1000 - $c - $b;
                if( bcpow($c,2) == bcpow($a,2) + bcpow($b,2) )
                    return bcmul($a,bcmul($b,$c));
            }
        }
    }

    /**
     * @title - Summation of primes
     *
     */

    /**
     * @title - Largest product in a grid
     *
     */

    /**
     * @title - Highly divisible triangular number
     *
     */

    /**
     * @title - Large sum
     *
     */

    /**
     * @title - Longest Collatz sequence
     *
     */

    /**
     * @title - Lattice paths
     *
     */

    /**
     * @title - Power digit sum
     *
     */

    /**
     * @title - Number letter counts
     *
     */

    /**
     * @title - Maximum path sum I
     *
     */

    /**
     * @title - Counting Sundays
     *
     */

    /**
     * @title - Factorial digit sum
     *
     */

    /**
     * @title - Amicable numbers
     *
     */

    /**
     * @title - Names scores
     *
     */

    /**
     * @title - Non-abundant sums
     *
     */

    /**
     * @title - Lexicographic permutations
     *
     */

    /**
     * @title - 1000-digit Fibonacci number
     *
     */

    /**
     * @title - Reciprocal cycles
     *
     */

    /**
     * @title - Quadratic primes
     *
     */

    /**
     * @title - Number spiral diagonals
     *
     */

    /**
     * @title - Distinct powers
     *
     */

}