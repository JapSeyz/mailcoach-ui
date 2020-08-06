<?php

use Faker\Generator;
use Illuminate\Support\Str;
use Spatie\Mailcoach\Enums\CampaignStatus;
use Spatie\Mailcoach\Models\Campaign;
use Spatie\Mailcoach\Models\EmailList;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Campaign::class, function (Generator $faker) {
    return [
        'name' => $faker->word,
        'subject' => $faker->sentence,
        'html' => $faker->randomHtml(),
        'track_opens' => $faker->boolean,
        'track_clicks' => $faker->boolean,
        'status' => CampaignStatus::DRAFT,
        'uuid' => $faker->uuid,
        'last_modified_at' => $faker->dateTimeBetween('-1 week', '+1 week'),
        'email_list_id' => function () {
            return factory(EmailList::class)->create(['uuid' => (string)Str::uuid()]);
        },
    ];
});
