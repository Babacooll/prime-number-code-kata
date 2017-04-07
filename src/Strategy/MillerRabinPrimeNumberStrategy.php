<?php

namespace OptimusPrime\Strategy;

/**
 * Class MillerRabinPrimeNumberStrategy
 *
 * @package OptimusPrime\Strategy
 */
class MillerRabinPrimeNumberStrategy implements PrimeNumberStrategyInterface
{
	/**
	 * @var int
	 */
	private $accuracy;

	/**
	 * MillerRabinPrimeNumberStrategy constructor.
	 *
	 * @param int $accuracy
	 */
	public function __construct($accuracy = 100)
	{
		$this->accuracy = $accuracy;
	}

	/**
	 * @param float $number
	 *
	 * @return bool
	 */
	public function isPrimeNumber(float $number): bool
	{
		if ($number == 2)
		{
			return true;
		}

		if ($number < 2 || $number % 2 == 0)
		{
			return false;
		}

		$d = $number - 1;
		$s = 0;

		while ($d % 2 == 0)
		{
			$d /= 2;
			$s++;
		}

		for ($i = 0; $i < $this->accuracy; $i++)
		{
			$a = rand(2, $number - 1);
			$x = bcpowmod($a, $d, $number);

			if ($x == 1 || $x == $number - 1)
			{
				continue;
			}

			for ($j = 1; $j < $s; $j++)
			{
				$x = @bcmod(bcmul($x, $x), $number);

				if ($x == 1)
				{
					return false;
				}

				if ($x == $number - 1)
				{
					continue 2;
				}
			}

			return false;
		}

		return true;
	}
}
