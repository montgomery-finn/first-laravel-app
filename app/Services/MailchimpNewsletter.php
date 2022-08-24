<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements INewsletter
{

    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe(string $email, string $list = null) 
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember('2ddfc58172', [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}