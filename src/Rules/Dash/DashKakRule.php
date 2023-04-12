<?php

namespace App\Helpers\Typograph\Rules\Dash;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class DashKakRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Кое-как, кой-кого, все-таки';
	}

	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\s|^|&nbsp;|>)(кое)-?(\040|\t|&nbsp;)-?(как)([.,!?;]|\040|&nbsp;|$)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2]."-".$m[4] . ($m[5] === "&nbsp;"? " " : $m[5]);
			},
			$text
		);

		$text = preg_replace_callback(
			'/(\s|^|&nbsp;|>)(кой)-?(\040|\t|&nbsp;)-?(кого)([.,!?;]|\040|&nbsp;|$)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2]."-".$m[4] . ($m[5] === "&nbsp;"? " " : $m[5]);
			},
			$text
		);

		return preg_replace_callback(
			'/(\s|^|&nbsp;|>)(вс[её])-?(\040|\t|&nbsp;)-?(таки)([.,!?;]|\040|&nbsp;|$)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2]."-".$m[4] . ($m[5] === "&nbsp;"? " " : $m[5]);
			},
			$text
		);
	}
}