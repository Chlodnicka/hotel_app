<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:06
 */

namespace Config;


use Prooph\ServiceBus\EventBus;
use Prooph\ServiceBus\Plugin\Router\EventRouter;

class EventRouterConfig
{
    /** @var EventBus  */
    private $eventBus;

    public function __construct(EventBus $eventBus)
    {
        $this->eventBus = $eventBus;
    }


    public function get()
    {
        $eventRouter = new EventRouter();
//        $eventRouter->route(EmailChanged::class)->to([$userProjector, 'onEmailChanged']);
//        $eventRouter->route(UserRegistered::class)->to([$userProjector, 'onUserRegistered']);
        $eventRouter->attachToMessageBus($this->eventBus);
    }

}