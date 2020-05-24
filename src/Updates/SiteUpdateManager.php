<?php

namespace App\Updates;

use App\Service\MessageGenerator;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SiteUpdateManager{
    private $messageGenerator;
    private $mailer;

    public function __construct(MessageGenerator $messageGenerator, MailerInterface $mailer)
    {
        $this->messageGenerator = $messageGenerator;
        $this->mailer = $mailer;
    }

    function notifyOfSiteUpdate(){
        $happyMessage = $this->messageGenerator->getHappyMessage();
        $email = (new Email())
                ->from('admin@example.com')
                ->to('manager@example.com')
                ->subject('hello world')
                ->text('Someone just updated the site. We told them '.$happyMessage);

        $this->mailer->send($email);
    }
}