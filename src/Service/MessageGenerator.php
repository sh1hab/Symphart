<?php
namespace App\Service;
use Psr\Log\LoggerInterface;

class MessageGenerator{
    private $logger;
    function __construct(LoggerInterface $logger){
      $this->logger = $logger;
    }

    public function gethappyMessage(){
        $this->logger->info("look! i just used a service ");
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $index  = array_rand($messages);
        return $messages[$index]; 
    }
}
