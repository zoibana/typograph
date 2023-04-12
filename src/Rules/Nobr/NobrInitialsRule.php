<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class NobrInitialsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка инициалов к фамилиям';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\s|^|\.|,|;|:|\?|!|&nbsp;)([А-ЯЁ])\.(\s|&nbsp;)?([А-ЯЁ])\.(\s|&nbsp;)?([А-ЯЁ][а-яё]+)(\s|$|\.|,|;|:|\?|!|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag($m[2] . ". " . $m[4] . ". " . $m[6], "span", ["class" => "nowrap"]) . $m[7];
			},
			$text
		);

		$text = preg_replace_callback(
			'/(\s|^|\.|,|;|:|\?|!|&nbsp;)([А-ЯЁ][а-яё]+)(\s|&nbsp;)([А-ЯЁ])\.(\s|&nbsp;)?([А-ЯЁ])\.(\s|$|\.|,|;|:|\?|!|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag($m[2] . (isset($m[3]) ? " " : "") . $m[4] . (isset($m[5]) ? " " : "") . $m[6], "span", ["class" => "nowrap"]) . $m[7];
			},
			$text
		);

		$text = preg_replace_callback(
			'/(\s|^|\.|,|;|:|\?|!|&nbsp;)([А-ЯЁ])(\s|&nbsp;)?([А-ЯЁ])(\s|&nbsp;)([А-ЯЁ][а-яё]+)(\s|$|\.|,|;|:|\?|!|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag($m[2] . " " . $m[4] . ". " . $m[6] . ".", "span", ["class" => "nowrap"]) . $m[7];
			},
			$text
		);

		return preg_replace_callback(
			'/(\s|^|\.|,|;|:|\?|!|&nbsp;)([А-ЯЁ][а-яё]+)(\s|&nbsp;)([А-ЯЁ])(\s|&nbsp;)?([А-ЯЁ])(\s|$|\.|,|;|:|\?|!|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag($m[2] . " " . $m[4] . (isset($m[5]) ? " " : "") . $m[6], "span", ["class" => "nowrap"]) . $m[7];
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