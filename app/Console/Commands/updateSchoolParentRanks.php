<?php

namespace App\Console\Commands;

use App\Models\School;
use App\Models\SchoolParentRank;
use App\Models\User;
use Illuminate\Console\Command;

class updateSchoolParentRanks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-school-parent-ranks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function getCompatibility($parent_lat, $parent_long, $school_lat, $school_long, $school_rank)
    {
        $recommendation_model_url = env('RECOMMENDATION_MODEL_URL');
        $response = \Http::get($recommendation_model_url, [
            'parent_lat' => $parent_lat,
            'parent_long' => $parent_long,
            'school_lat' => $school_lat,
            'school_long' => $school_long,
            'school_rank' => $school_rank,
        ]);
        return $response->json()['match_percentage'];
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // iterate over all parents and call api to get the compatibility with each school
        $parents = User::all();
        foreach ($parents as $parent) {
            if(!$parent->lat || !$parent->lng) continue;
            $parent_lat = $parent->lat;
            $parent_long = $parent->lng;
            $schools = School::all();
            foreach ($schools as $school) {
                if (!$school->lat || !$school->lng) continue;
                $school_lat = $school->lat;
                $school_long = $school->lng;
                $school_rank = $school->rank;
                // make api call to get compatibility
                $compatibility = $this->getCompatibility($parent_lat, $parent_long, $school_lat, $school_long, $school_rank);
                // create or update the rank
                $rank = SchoolParentRank::where('school_id', $school->id)->where('parent_id', $parent->id)->first();
                if ($rank) {
                    $rank->update(['compatibility' => $compatibility]);
                } else {
                    SchoolParentRank::create([
                        'school_id' => $school->id,
                        'parent_id' => $parent->id,
                        'compatibility' => $compatibility,
                    ]);
                }
            }
        }
    }
}
