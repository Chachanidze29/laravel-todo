<?php

namespace App\Observers;

use App\Models\Todos;

class TodoObserver
{
    /**
     * Handle the Todos "created" event.
     *
     * @param  \App\Actions\Models\Todos  $todos
     * @return void
     */
    public $afterCommit = true;

    public function created(Todos $todos)
    {
        dump("todo with content : '".$todos->content."' was created");
    }

    /**
     * Handle the Todos "updated" event.
     *
     * @param  \App\Actions\Models\Todos  $todos
     * @return void
     */
    public function updated(Todos $todos)
    {
        //
    }

    /**
     * Handle the Todos "deleted" event.
     *
     * @param  \App\Actions\Models\Todos  $todos
     * @return void
     */
    public function deleted(Todos $todos)
    {
        //
    }

    /**
     * Handle the Todos "restored" event.
     *
     * @param  \App\Actions\Models\Todos  $todos
     * @return void
     */
    public function restored(Todos $todos)
    {
        //
    }

    /**
     * Handle the Todos "force deleted" event.
     *
     * @param  \App\Actions\Models\Todos  $todos
     * @return void
     */
    public function forceDeleted(Todos $todos)
    {
        //
    }
}
