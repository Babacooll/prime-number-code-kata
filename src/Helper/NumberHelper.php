<?php

namespace OptimusPrime\Helper;

use OptimusPrime\Number\InvalidNumberException;

/**
 * Class NumberHelper
 *
 * @package OptimusPrime\Helper
 */
class NumberHelper
{
	/**
	 * @param float $number
	 *
	 * @return array
	 */
	public function getAllSubNumbersinNumber(float $number): array
	{
		$number = number_format($number, 0, '', '');
		$subs   = [$number];
		$length = strlen($number);

		for ($i = 0; $i < $length; $i++)
		{
			for ($j = $i; $j < $length; $j++)
			{
				$subs[] = substr($number, $i, $j);
			}
		}

		return array_filter(array_unique($subs));
	}

	/**
	 * @param mixed $number
	 *
	 * @return float
	 * @throws InvalidNumberException
	 */
	public function convertToFloatNumber($number): float
	{
		if (!is_numeric($number))
		{
			throw new InvalidNumberException();
		}

		return round($number);
	}
}
