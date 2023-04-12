<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class AbbrBeforeUnitRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена символов и привязка сокращений в размерных величинах: м, см, м2…';
	}

	public function apply(string $text): string
	{
		$text = preg_replace(
			'/(\s|^|>|&nbsp;|,)(\d+)( |&nbsp;)?(м|мм|см|дм|км|гм|km|dm|cm|mm)(\s|\.|!|\?|,|$|&plusmn;|;|<)/iu',
			"\1\2&nbsp;\4\5",
			$text
		);

		return preg_replace_callback(
			'/(\s|^|>|&nbsp;|,)(\d+)( |&nbsp;)?(м|мм|см|дм|км|гм|km|dm|cm|mm)([32]|&sup3;|&sup2;)(\s|\.|!|\?|,|$|&plusmn;|;|<)/iu',
			static function ($m) {
				return $m[1] . $m[2] . "&nbsp;" . $m[4] . ($m[5] === "3" || $m[5] === "2" ? "&sup" . $m[5] . ";" : $m[5]) . $m[6];
			},
			$text
		);
	}
}