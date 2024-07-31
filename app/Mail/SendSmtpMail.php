<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSmtpMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        try {

            $this->data['content']['body'] = '';
            $subject = $this->data['content']['subject'] ?? __('Default Subject');


            if (!empty($this->data['content']['template_title'])) {
                $user = $this->data['content']['user'] ?? null;
                if ($user) {
                    $template = $this->data['content']['email_templates'] ?? null;

                    if ($template) {
                        $tags = ['{name}', '{email}', '{site_name}', '{otp}', '{confirmation_link}', '{reset_link}', '{login_link}'];

                        $confirmation_link = $this->data['content']['confirmation_link'] ?? '';
                        $reset_link = $this->data['content']['reset_link'] ?? '';
                        $login_link = $this->data['content']['login_link'] ?? '';

                        $replaces = [
                            $user['first_name'] . ' ' . $user['last_name'],
                            $user['email'],
                            setting('system_name'),
                            $this->data['content']['otp'] ?? '',
                            '<a href="' . $confirmation_link . '">' . $confirmation_link . '</a>',
                            '<a href="' . $reset_link . '">' . $reset_link . '</a>',
                            '<a href="' . $login_link . '">' . $login_link . '</a>'
                        ];

                        $subject = str_replace($tags, $replaces, $template['subject']);
                        $this->data['content']['body'] = str_replace($tags, $replaces, $template['body']);

                    }
                }
            }
            return $this->subject($subject)->view($this->data['view'], $this->data['content']);
        } catch (\Exception $e) {
            throw $e;
        }
    }


}
