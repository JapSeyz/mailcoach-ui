<?php

use Faker\Generator;
use Spatie\Mailcoach\Models\Campaign;
use Spatie\Mailcoach\Models\Send;
use Spatie\Mailcoach\Models\Subscriber;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Send::class, function (Generator $faker) {
    return [
        'campaign_id' => factory(Campaign::class),
        'subscriber_id' => factory(Subscriber::class),
    ];
});
