<?php

namespace App\Helpers\Typograph\Groups;

abstract class AbstractRuleGroup
{
	public function apply(string $text): string
	{
		$rules = $this->rules();

		foreach ($rules as $rule) {
			$rule = new $rule;
			$text = $rule->apply($text);
		}

		return $text;
	}

	public function getClasses(): array
	{
		$classes = [];
		foreach ($this->rules() as $rule) {
			$rule = new $rule;
			$classes = array_merge($classes, $rule->getClasses());
		}

		return $classes;
	}
}