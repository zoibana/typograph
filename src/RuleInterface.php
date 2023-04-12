<?php

namespace App\Helpers\Typograph;

interface RuleInterface
{
	public function getDescription(): string;

	public function apply(string $text): string;

	public function getClasses(): array;
}