<?php

namespace zoibana\Typograph\Rules\Dash;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class DashAfterMarksRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Тире после знаков восклицания, троеточия и прочее';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\.|!|\?|&hellip;)(\040|\t|&nbsp;)(-|&mdash;)(\040|\t|&nbsp;)/',
			'\1&mdash;&nbsp;',
			$text
		);
	}
}