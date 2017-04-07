<?php

namespace OptimusPrime\Strategy;

/**
 * Interface PrimeNumberStrategyInterface
 *
 * @package OptimusPrime\Strategy
 */
interface PrimeNumberStrategyInterface
{
	/**
	 * @param float $number
	 *
	 * @return bool
	 */
	public function isPrimeNumber(float $number): bool;
}
