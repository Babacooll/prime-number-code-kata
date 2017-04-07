<?php

namespace OptimusPrime;

use Generator;
use OptimusPrime\Helper\NumberHelper;
use OptimusPrime\Strategy\BasicPrimeNumberStrategy;
use OptimusPrime\Strategy\PrimeNumberStrategyInterface;

/**
 * Class OptimusPrime
 *
 * @package OptimusPrime
 */
class OptimusPrime
{
	/**
	 * @var NumberHelper
	 */
	private $numberHelper;

	/**
	 * OptimusPrime constructor.
	 */
	public function __construct()
	{
		$this->numberHelper = new NumberHelper();
	}

	/**
	 * @param mixed                             $number
	 * @param PrimeNumberStrategyInterface|null $primeNumberStrategy
	 *
	 * @return Generator
	 */
	public function getPrimeNumbersInNumber($number, PrimeNumberStrategyInterface $primeNumberStrategy = null): Generator
	{
		$primeNumberStrategy = $primeNumberStrategy ?: new BasicPrimeNumberStrategy();
		$number              = $this->numberHelper->convertToFloatNumber($number);

		$subNumbers = $this->numberHelper->getAllSubNumbersinNumber($number);

		arsort($subNumbers);

		foreach ($subNumbers as $subNumber)
		{
			if ($primeNumberStrategy->isPrimeNumber($subNumber))
			{
				yield $subNumber;
			}
		}
	}

	/**
	 * @param mixed                             $number
	 * @param PrimeNumberStrategyInterface|null $primeNumberStrategy
	 *
	 * @return int|null
	 */
	public function getHighestPrimeNumberInNumber($number, PrimeNumberStrategyInterface $primeNumberStrategy = null): ?int
	{
		foreach ($this->getPrimeNumbersInNumber($number, $primeNumberStrategy) as $primeNumber)
		{
			return $primeNumber;
		}

		return null;
	}
}
