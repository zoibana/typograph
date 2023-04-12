<?php

namespace zoibana\Typograph\Rules\Dash;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class DashKaDeKasRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка дефисов с частицами ка, де, кась';
	}

	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\s|^|&nbsp;|>)([а-яё]+)(\040|\t|&nbsp;)(ка)([.,!?;]|\040|&nbsp;|$)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2] . "-" . $m[4] . ($m[5] === "&nbsp;" ? " " : $m[5]);
			},
			$text
		);

		$text = preg_replace_callback(
			'/(\s|^|&nbsp;|>)([а-яё]+)(\040|\t|&nbsp;)(де)([.,!?;]|\040|&nbsp;|$)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2] . "-" . $m[4] . ($m[5] === "&nbsp;" ? " " : $m[5]);
			},
			$text
		);

		return preg_replace_callback(
			'/(\s|^|&nbsp;|>)([а-яё]+)(\040|\t|&nbsp;)(кась)([.,!?;]|\040|&nbsp;|$)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2] . "-" . $m[4] . ($m[5] === "&nbsp;" ? " " : $m[5]);
			},
			$text
		);
	}
}