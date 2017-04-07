<?php

namespace OptimusPrime\Number;

use Exception;

/**
 * Class InvalidNumberException
 *
 * @package OptimusPrime\Number
 */
class InvalidNumberException extends Exception
{
	protected $message = 'Invalid number provided';
}
