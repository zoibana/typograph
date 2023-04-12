<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Nobr\NobrBeforeParticleRule;
use zoibana\Typograph\Rules\Nobr\NobrCelciusRule;
use zoibana\Typograph\Rules\Nobr\NobrHyphenRule;
use zoibana\Typograph\Rules\Nobr\NobrInitialsDotsRule;
use zoibana\Typograph\Rules\Nobr\NobrInitialsRule;
use zoibana\Typograph\Rules\Nobr\NobrIPRule;
use zoibana\Typograph\Rules\Nobr\NobrKaktoRule;
use zoibana\Typograph\Rules\Nobr\NobrNbspInTheEndRule;
use zoibana\Typograph\Rules\Nobr\NobrPhoneExtRule;
use zoibana\Typograph\Rules\Nobr\NobrPhoneRule;
use zoibana\Typograph\Rules\Nobr\NobrShortWordsRule;
use zoibana\Typograph\Rules\Nobr\NobrSuperNbspRule;
use zoibana\Typograph\RuleGroupInterface;

class NobrRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Неразрывные конструкции';
	}

	public function rules(): array
	{
		return [
			NobrSuperNbspRule::class,
			NobrNbspInTheEndRule::class,
			NobrPhoneRule::class,
			NobrPhoneExtRule::class,
			NobrIPRule::class,
			NobrInitialsDotsRule::class,
			NobrInitialsRule::class,
			NobrBeforeParticleRule::class,
			NobrKaktoRule::class,
			NobrCelciusRule::class,
			NobrShortWordsRule::class,
			NobrHyphenRule::class,
		];
	}

}