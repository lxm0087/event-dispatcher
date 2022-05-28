<?php

declare(strict_types=1);

namespace Lxm\Event;

/**
 * 侦听器
 */
interface ListenerInterface
{
    /**
     * 侦听响应
     *
     * @param object $event
     * @return void
     */
    public function __invoke(object $event): void;
}
