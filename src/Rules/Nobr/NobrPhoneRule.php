<?php

namespace zoibana\Typograph\Rules\Nobr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NobrPhoneRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Объединение в неразрывные конструкции номеров телефонов';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/([\D+]|^)([+]?\d{1,3})( |&nbsp;|&thinsp;)(\d{3,4}|\(\d{3,4}\))( |&nbsp;|&thinsp;)(\d{2,3})(-|&minus;)(\d{2})(-|&minus;)(\d{2})(\D|$)/ui',
			function ($m) {
				return $m[1] . (($m[1] === ">" || $m[11] === "<") ? ($m[2] . " " . $m[4] . " " . $m[6] . "-" . $m[8] . "-" . $m[10]) : $this->tag($m[2] . " " . $m[4] . " " . $m[6] . "-" . $m[8] . "-" . $m[10], "span", ["class" => "nowrap"])) . $m[11];
			},
			$text
		);

		return preg_replace_callback(
			'/([\D\+]|^)([+]?\d{1,3})( |&nbsp;|&thinsp;)(\d{3,4})( |&nbsp;|&thinsp;)(\d{2,3})(-|&minus;)(\d{2})(-|&minus;)(\d{2})(\D|$)/ui',
			function ($m) {
				return $m[1] . (($m[1] === ">" || $m[11] === "<") ? ($m[2] . " " . $m[4] . " " . $m[6] . "-" . $m[8] . "-" . $m[10]) : $this->tag($m[2] . " " . $m[4] . " " . $m[6] . "-" . $m[8] . "-" . $m[10], "span", ["class" => "nowrap"])) . $m[11];
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