<?php

namespace zoibana\Typograph\Rules\OpticalAlign;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class OpticalAlignQuoteExtraRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Оптическое выравнивание кавычки';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(<' . self::BASE64_PARAGRAPH_TAG . '>)([\040\t]+)?(&laquo;)/i',
			function ($m) {
				return $m[1] . $this->tag($m[3], "span", ["class" => "oa_oquote_nl"]);
			},
			$text
		);
	}
}