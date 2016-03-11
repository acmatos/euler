<?php

class Math extends Help{

	/**
	 * Implementation of Sieve of Eratosthenes
	 * https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes
	 * @param  int $n
	 * @return array    Array of primes
	 */
	protected function sieve($n)
	{
	    $sieve = range(3,$n,2);
	    $sieve = array_flip($sieve);
	    foreach($sieve as $s => $v) {
	        $mlmax = ceil($n / $s);

	        if($mlmax < 1) {
	            break;
	        }

	        for($i = $s; $i <= $mlmax; $i++) {
	            $composite = bcmul($s,$i);
	            if(isset($sieve[$composite])) {
	                unset($sieve[$composite]);
	            }
	        }
	    }

	    return $sieve;
	}

	/**
	 * Assert given number is a prime number.
	 * @param  int  $n
	 * @return boolean
	 */
	protected function isPrime($n)
	{
	    for($i = 2; $i < $n; $i++) {
	        if(!($n % $i)) {
	            return false;
	        }
	    }
	    return true;
	}

	/**
	 * Assert division ends with no remainders
	 * @param  number  $dividend
	 * @param  number  $divisor
	 * @return boolean           true if evenly divisible
	 */
	protected function isEvenlyDivisible($dividend, $divisor)
	{
		return !($dividend % $divisor);
	}
}