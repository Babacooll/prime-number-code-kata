<?php

namespace OptimusPrime\Strategy;

/**
 * Class BasicPrimeNumberStrategy
 *
 * @package OptimusPrime\Strategy
 */
class BasicPrimeNumberStrategy implements PrimeNumberStrategyInterface
{
	/**
	 * @param float $number
	 *
	 * @return bool
	 */
	public function isPrimeNumber(float $number): bool
	{
		for ($i = 2; $i < $number; $i++)
		{
			if ($number % $i == 0)
			{
				return false;
			}
		}

		return true;
	}
}
