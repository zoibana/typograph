<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class AbbrMoneyAbbrRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Форматирование денежных сокращений (расстановка пробелов и привязка названия валюты к числу)';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\d)((\040|&nbsp;)?(тыс|млн|млрд)\.?(\040|&nbsp;)?)?(\040|&nbsp;)?(руб\.|долл\.|евро|€|&euro;|\$|у[.]? ?е[.]?)/iu',
			static function ($m) {
				return $m[1] . ($m[4] ? "&nbsp;" . $m[4] . ($m[4] === "тыс" ? "." : "") : "") . "&nbsp;" . (!preg_match("#у[.]? ?е[.]?#iu", $m[7]) ? $m[7] : "у.е.");
			},
			$text
		);
	}
}