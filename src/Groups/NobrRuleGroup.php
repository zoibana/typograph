<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Nobr\NobrBeforeParticleRule;
use App\Helpers\Typograph\Rules\Nobr\NobrCelciusRule;
use App\Helpers\Typograph\Rules\Nobr\NobrHyphenRule;
use App\Helpers\Typograph\Rules\Nobr\NobrInitialsDotsRule;
use App\Helpers\Typograph\Rules\Nobr\NobrInitialsRule;
use App\Helpers\Typograph\Rules\Nobr\NobrIPRule;
use App\Helpers\Typograph\Rules\Nobr\NobrKaktoRule;
use App\Helpers\Typograph\Rules\Nobr\NobrNbspInTheEndRule;
use App\Helpers\Typograph\Rules\Nobr\NobrPhoneExtRule;
use App\Helpers\Typograph\Rules\Nobr\NobrPhoneRule;
use App\Helpers\Typograph\Rules\Nobr\NobrShortWordsRule;
use App\Helpers\Typograph\Rules\Nobr\NobrSuperNbspRule;
use App\Helpers\Typograph\RuleGroupInterface;

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