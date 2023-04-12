<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class NobrPhoneExtRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Дополнительный формат номеров телефонов';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\D|^)\+\s?(\d)\s?\((\d{3,4})\)\s?(\d{3})(\d{2})(\d{2})(\D|$)/u',
			function ($m) {
				return $m[1] . $this->tag("+" . $m[2] . " " . $m[3] . " " . $m[4] . "-" . $m[5] . "-" . $m[6], "span", ["class" => "nowrap"]) . $m[7];
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return [
			'nowrap' => 'word-spacing:nowrap;',
		];
	}
}