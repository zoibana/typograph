<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class AbbrGostRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка сокращения ГОСТ к номеру';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\040|\t|&nbsp;|^)ГОСТ( |&nbsp;)?(\d+)((-|&minus;|&mdash;)(\d+))?(( |&nbsp;)(-|&mdash;))?/iu',
			function ($m) {
				return $m[1] . $this->tag("ГОСТ " . $m[3] . (isset($m[6]) ? "&ndash;" . $m[6] : "") . (isset($m[7]) ? " &mdash;" : ""), "span", ["class" => "nowrap"]);
			},
			$text
		);

		return preg_replace_callback(
			'/(\040|\t|&nbsp;|^|>)ГОСТ( |&nbsp;)?(\d+)(-|&minus;|&mdash;)(\d+)/ui',
			static function ($m) {
				return $m[1] . "ГОСТ " . $m[3] . "&ndash;" . $m[5];
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return ['nowrap' => 'word-spacing:nowrap;'];
	}
}