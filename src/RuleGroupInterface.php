<?php

namespace zoibana\Typograph;

interface RuleGroupInterface
{
	public function getName(): string;

	public function getClasses(): array;

	public function rules(): array;

	public function apply(string $text): string;
}