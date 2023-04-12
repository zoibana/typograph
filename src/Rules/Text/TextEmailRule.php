<?php

namespace App\Helpers\Typograph\Rules\Text;

use App\Helpers\Typograph\RuleInterface;
use App\Helpers\Typograph\Rules\AbstractBaseRule;

class TextEmailRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Выделение эл. почты из текста';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\s|^|&nbsp;|\()([a-z0-9\-_.]{2,})@([a-z0-9\-.]{2,})\.([a-z]{2,6})(\)|\s|\.|,|!|\?|$|<)/',
			function ($matches) {
				$email = $matches[2] . "@" . $matches[3] . "." . $matches[4];
				$tag = $this->tag($email, 'a', ['href' => 'mailto:' . $email]);

				return $matches[1] . $tag . $matches[5];
			},
			$text
		);
	}
}