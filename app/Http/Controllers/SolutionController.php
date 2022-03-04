<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Problem;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{

    public function index()
    {
        $soln = Solution::select("solutions")
        ->leftJoin('problems', 'problems.p_id', "=", 'solutions.problem_id')
        ->select('solutions.*', 'problems.*')
        ->get();
        //return dd($soln);
        return view('solutions.index' ,compact('soln'));
    }

    public function create()
    {
        $problems = Problem::orderBy('p_id', 'asc')->get();
        $soln = Solution::select("solutions")
        ->leftJoin('problems', 'problems.p_id', "=", 'solutions.problem_id')
        ->select('solutions.*', 'problems.*')
        ->get();
        return View('solutions.carsSolutions')->with(['problems' => $problems, 'soln' => $soln]);
    }

    protected function store(Request $request)
    {

        $user = auth()->user()->id;
        $solution = new Solution;
        if($this->middleware(['role:expert'])){
            //Auth::user()->hasRole('expert')
          $solution->expert_id = $user;
          $solution->soln = $request->soln;
          $solution->problem_id = $request->problem_id;
          $solution->save();
          alert()->success('','Good Car Solution Added!');
          return redirect()->back();
        }

        //Solution::create($request->all());
        return redirect()->back();//If something Went Wrong
    }

    public function show($id)
    {
        if ($id)
         {
            $solution_id = Solution::find($id);
            //dd($solution_id);
            return view('solutions.edit',compact('solution_id'));
        }

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        dd($id);
    }

    public function destroy($id)
    {
        //
    }
}
