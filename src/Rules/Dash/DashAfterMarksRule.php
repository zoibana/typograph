<?php

namespace App\Helpers\Typograph\Rules\Dash;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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