<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null) 
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember('2ddfc58172', [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }

    protected function client()
    {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us8'
        ]);

        return $mailchimp;
    }
}