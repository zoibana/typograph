<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberSupRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Верхний индекс';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/([a-zа-яё0-9])\^(\d{1,3})([^а-яёa-z0-9]|$)/ui',
			function ($m) {
				return $m[1] . $this->tag($this->tag($m[2], "small"), "sup") . $m[3];
			},
			$text
		);
	}
}