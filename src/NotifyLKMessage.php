<?php

namespace ApiChef\NotifyLK;

use Illuminate\Contracts\Support\Arrayable;

class NotifyLKMessage implements Arrayable
{
    private $content;
    private $to;
    private $isUnicode;
    private $sender = null;

    /** @var Contact */
    private $contact = null;

    public function content(string $content, bool $isUnicode = false)
    {
        $this->content = $content;
        $this->isUnicode = $isUnicode;

        return $this;
    }

    public function to(string $to)
    {
        $this->to = $to;

        return $this;
    }

    public function sender(string $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    public function contact(Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    public function toArray()
    {
        $data = [
            'user_id' => config('notify-lk.credentials.user_id'),
            'api_key' => config('notify-lk.credentials.api_key'),
            'sender_id' => $this->sender ?: config('notify-lk.default_sender_id'),
            'message' => $this->content,
            'to' => $this->to,
        ];

        if ($this->isUnicode) {
            $data['type'] = 'unicode';
        }

        if ($this->contact !== null) {
            $data = array_merge($data, $this->contact->toArray());
        }

        return $data;
    }
}
