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
	 * @var PrimeNumberStrategyInterface
	 */
	private $primeNumberStrategy;

	/**
	 * OptimusPrime constructor.
	 *
	 * @param PrimeNumberStrategyInterface|null $primeNumberStrategy
	 */
	public function __construct(PrimeNumberStrategyInterface $primeNumberStrategy = null)
	{
		$this->primeNumberStrategy = $primeNumberStrategy ?: new BasicPrimeNumberStrategy();
		$this->numberHelper        = new NumberHelper();
	}

	/**
	 * @param mixed $number
	 *
	 * @return Generator
	 */
	public function getPrimeNumbersInNumber($number): Generator
	{
		$number = $this->numberHelper->convertToFloatNumber($number);

		$subNumbers = $this->numberHelper->getAllSubNumbersinNumber($number);

		arsort($subNumbers);

		foreach ($subNumbers as $subNumber)
		{
			if ($this->primeNumberStrategy->isPrimeNumber($subNumber))
			{
				yield $subNumber;
			}
		}
	}

	/**
	 * @param mixed $number
	 *
	 * @return int
	 */
	public function getHighestPrimeNumberInNumber($number): ?int
	{
		foreach ($this->getPrimeNumbersInNumber($number) as $primeNumber)
		{
			return $primeNumber;
		}

		return null;
	}
}
