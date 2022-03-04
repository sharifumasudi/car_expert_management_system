<?php

namespace App\Http\Livewire;
use App\Models\Car;
use App\Models\Problem;
use App\Models\Solution;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FetchCarProblem extends Component
{
    public $count = 0;
    public $search_problem;
    public function render()
    {
        sleep(1);
        $search_problem = '%' .$this->search_problem. '%';

        $problems = DB::table('solutions')
                            ->join('problems', 'problems.p_id', '=', 'solutions.problem_id')
                            ->where('problems.problem_desc', 'LIKE', $search_problem)
                            ->orWhere('solutions.soln', 'LIKE',$search_problem)
                            ->select(trim('problems.*'),trim('solutions.*'))
                            ->paginate(1);
        return view('livewire.fetch-car-problem', compact('problems'));
    }
}
