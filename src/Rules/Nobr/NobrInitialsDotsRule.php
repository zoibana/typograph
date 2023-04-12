<?php

namespace zoibana\Typograph\Rules\Nobr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NobrInitialsDotsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Простановка точек к инициалам у фамилии';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\s|^|\.|,|;|:|\?|!|&nbsp;)([А-ЯЁ])\.?(\s|&nbsp;)?([А-ЯЁ])(\s|&nbsp;)([А-ЯЁ][а-яё]+)(\s|$|\.|,|;|:|\?|!|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag($m[2] . ". " . $m[4] . ". " . $m[6], "span", ["class" => "nowrap"]) . $m[7];
			},
			$text
		);


		return preg_replace_callback(
			'/(\s|^|\.|,|;|:|\?|!|&nbsp;)([А-ЯЁ][а-яё]+)(\s|&nbsp;)([А-ЯЁ])\.?(\s|&nbsp;)?([А-ЯЁ])\.?(\s|$|\.|,|;|:|\?|!|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag($m[2] . " " . $m[4] . ". " . $m[6] . ".", "span", ["class" => "nowrap"]) . $m[7];
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