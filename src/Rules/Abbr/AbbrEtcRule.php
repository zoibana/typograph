<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class AbbrEtcRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Объединение сокращений и т.д., и т.п., в т.ч.';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(^|\s|&nbsp;)и( |&nbsp;)т\.? ?д(\.|$|\s|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag("и т. д.", "span", ["class" => "nowrap"]) . ($m[3] !== "." ? $m[3] : "");
			},
			$text
		);

		$text = preg_replace_callback(
			'/(^|\s|&nbsp;)и( |&nbsp;)т\.? ?п(\.|$|\s|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag("и т. п.", "span", ["class" => "nowrap"]) . ($m[3] !== "." ? $m[3] : "");
			},
			$text
		);

		return preg_replace_callback(
			'/(^|\s|&nbsp;)в( |&nbsp;)т\.? ?ч(\.|$|\s|&nbsp;)/u',
			function ($m) {
				return $m[1] . $this->tag("в т. ч.", "span", ["class" => "nowrap"]) . ($m[3] !== "." ? $m[3] : "");
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return ['nowrap' => 'word-spacing:nowrap;'];
	}
}