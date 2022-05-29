<?php

declare(strict_types=1);

namespace Lxm\Event;

use Psr\EventDispatcher\{EventDispatcherInterface, ListenerProviderInterface, StoppableEventInterface};

/**
 * 事件调度器
 */
class Dispatcher implements EventDispatcherInterface, ListenerProviderInterface
{
    /**
     * 事件侦听器列表
     *
     * @var callable[][]
     */
    private array $listeners;

    /**
     * 初始化事件侦听器列表
     *
     * @param callable[][] $listeners
     */
    public function __construct(array $listeners = [])
    {
        $this->listeners = $listeners;
    }

    /**
     * 分发事件
     *
     * @param object $event
     * @return object
     */
    public function dispatch(object $event): object
    {
        $listeners = $this->getListenersForEvent($event);
        if ($event instanceof StoppableEventInterface) {
            foreach ($listeners as $listener) {
                if ($event->isPropagationStopped()) {
                    break;
                }
                $listener($event);
            }
        } else {
            foreach ($listeners as $listener) {
                $listener($event);
            }
        }
        return $event;
    }

    /**
     * 返回事件的侦听器群
     *
     * @param object $event
     * @return array
     */
    public function getListenersForEvent(object $event): array
    {
        return $this->listeners[get_class($event)] ?? [];
    }

    /**
     * 添加事件侦听器
     *
     * @param string $event
     * @param ListenerInterface $listener
     * @return void
     */
    public function on(string $event, ListenerInterface $listener): void
    {
        $this->listeners[$event][] = $listener;
    }
}
