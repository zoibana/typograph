<?php

namespace App\Helpers\Typograph\Rules\OpticalAlign;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class OpticalAlignBracketsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Оптическое выравнивание для пунктуации (скобка)';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\040|&nbsp;|\t)\(/i',
			function ($m) {
				return $this->tag($m[1], "span", ["class" => "oa_obracket_sp_s"])
					. $this->tag("(", "span", ["class" => "oa_obracket_sp_b"]);
			},
			$text
		);

		return preg_replace_callback(
			'/(\n|\r|^)\(/i',
			function ($m) {
				return $m[1] . $this->tag("(", "span", ["class" => "oa_obracket_nl_b"]);
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return [
			'oa_obracket_sp_s' => "margin-right:0.3em;",
			"oa_obracket_sp_b" => "margin-left:-0.3em;",
			"oa_obracket_nl_b" => "margin-left:-0.3em;",
		];
	}
}