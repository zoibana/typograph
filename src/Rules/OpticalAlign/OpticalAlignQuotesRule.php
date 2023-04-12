<?php

namespace App\Helpers\Typograph\Rules\OpticalAlign;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class OpticalAlignQuotesRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Оптическое выравнивание открывающей кавычки';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/([a-zа-яё\-]{3,})(\040|&nbsp;|\t)(&laquo;)/ui',
			function ($m) {
				$spanLeft = $this->tag($m[2], "span", ["class" => "oa_oqoute_sp_s"]);
				$spanRight = $this->tag($m[3], "span", ["class" => "oa_oqoute_sp_q"]);

				return $m[1] . $spanLeft . $spanRight;
			},
			$text
		);

		return preg_replace_callback(
			'/(\n|\r|^)(&laquo;)/i',
			function ($m) {
				return $m[1] . $this->tag($m[2], "span", ["class" => "oa_oquote_nl"]);
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return [
			'oa_oquote_nl' => "margin-left:-0.44em;",
			'oa_oqoute_sp_s' => "margin-right:0.44em;",
			'oa_oqoute_sp_q' => "margin-left:-0.44em;",
		];
	}
}