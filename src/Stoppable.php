<?php

declare(strict_types=1);

namespace Lxm\Event;

/**
 * 事件可停止特征
 */
trait Stoppable
{
    /**
     * 事件是否停止传播
     *
     * @var bool
     */
    private bool $isPropagationStopped = false;

    /**
     * 返回事件是否停止传播
     *
     * @return bool
     */
    public function isPropagationStopped(): bool
    {
        return $this->isPropagationStopped;
    }

    /**
     * 停止传播
     *
     * @return void
     */
    public function stopPropagation(): void
    {
        $this->isPropagationStopped = true;
    }
}
