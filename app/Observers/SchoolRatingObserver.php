<?php

namespace App\Observers;

use App\Models\SchoolRating;

class SchoolRatingObserver
{
    /**
     * Handle the SchoolRating "created" event.
     */
    public function created(SchoolRating $schoolRating): void
    {
        // update school rate in school table
        $school = $schoolRating->school;
        $school->rate = $school->ratings()->avg('rating');
        $school->save();
    }

    /**
     * Handle the SchoolRating "updated" event.
     */
    public function updated(SchoolRating $schoolRating): void
    {
        // update school rate in school table
        $school = $schoolRating->school;
        $school->rate = $school->ratings()->avg('rating');
        $school->save();
    }

    /**
     * Handle the SchoolRating "deleted" event.
     */
    public function deleted(SchoolRating $schoolRating): void
    {
        //
    }

    /**
     * Handle the SchoolRating "restored" event.
     */
    public function restored(SchoolRating $schoolRating): void
    {
        //
    }

    /**
     * Handle the SchoolRating "force deleted" event.
     */
    public function forceDeleted(SchoolRating $schoolRating): void
    {
        //
    }
}
