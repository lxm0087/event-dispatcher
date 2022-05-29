<?php

declare(strict_types=1);

namespace Lxm\Event;

use Psr\EventDispatcher\StoppableEventInterface as PsrStoppableEventInterface;

/**
 * 可停止事件
 */
interface StoppableEventInterface extends PsrStoppableEventInterface
{
    /**
     * 停止传播
     *
     * @return void
     */
    public function stopPropagation(): void;
}
