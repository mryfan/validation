<?php

namespace Fy97Validation\Illuminate\Support\Testing\Fakes;

use Illuminate\Bus\PendingBatch;
use Fy97Validation\Illuminate\Support\Collection;

class PendingBatchFake extends PendingBatch
{
    /**
     * The fake bus instance.
     *
     * @var \Fy97Validation\Illuminate\Support\Testing\Fakes\BusFake
     */
    protected $bus;

    /**
     * Create a new pending batch instance.
     *
     * @param  \Fy97Validation\Illuminate\Support\Testing\Fakes\BusFake  $bus
     * @param  \Fy97Validation\Illuminate\Support\Collection  $jobs
     * @return void
     */
    public function __construct(BusFake $bus, Collection $jobs)
    {
        $this->bus = $bus;
        $this->jobs = $jobs;
    }

    /**
     * Dispatch the batch.
     *
     * @return \Illuminate\Bus\Batch
     */
    public function dispatch()
    {
        return $this->bus->recordPendingBatch($this);
    }
}
