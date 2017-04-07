<?php

namespace OptimusPrime\Strategy;

/**
 * Class AdvancedPrimeNumberStrategy
 *
 * @package OptimusPrime\Strategy
 */
class AdvancedPrimeNumberStrategy implements PrimeNumberStrategyInterface
{
	/**
	 * @param float $number
	 *
	 * @return bool
	 */
	public function isPrimeNumber(float $number): bool
	{
		if ($number % 2 == 0)
		{
			return false;
		}

		for ($i = 3; $i <= sqrt($number); $i = $i + 2)
		{
			if ($number % $i == 0)
			{
				return false;
			}
		}

		return true;
	}
}
