<?php

namespace App\Helpers\Typograph\Rules\Date;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class DateNoBrYearRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка года к дате';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\s|&nbsp;)(\d{2}\.\d{2}\.(\d{2})?\d{2})(\s|&nbsp;)?г(\.|\s|&nbsp;)/ui',
			function ($m) {
				return $m[1] . $this->tag($m[2] . " г.", "span", ["class" => "nowrap"]) . ($m[5] === "." ? "" : " ");
			},
			$text
		);

		return preg_replace_callback(
			'/(\s|&nbsp;)(\d{2}\.\d{2}\.(\d{2})?\d{2})(\s|&nbsp;|\.(\s|&nbsp;|$)|$)/ui',
			function ($m) {
				return $m[1] . $this->tag($m[2], "span", ["class" => "nowrap"]) . $m[4];
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