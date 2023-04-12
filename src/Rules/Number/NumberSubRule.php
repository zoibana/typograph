<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberSubRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Нижний индекс';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/([a-zа-яё0-9])_(\d{1,3})([^@а-яёa-z0-9]|$)/ui',
			function ($m) {
				return $m[1] . $this->tag($this->tag($m[2], "small"), "sub") . $m[3];
			},
			$text
		);
	}
}