<?php

namespace Spatie\Mailcoach\Tests\database\factories;

use Faker\Generator;
use Spatie\Mailcoach\Models\Campaign;
use Spatie\Mailcoach\Models\CampaignLink;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(CampaignLink::class, function (Generator $faker) {
    return [
        'campaign_id' => factory(Campaign::class),
        'url' => $faker->url,
    ];
});
