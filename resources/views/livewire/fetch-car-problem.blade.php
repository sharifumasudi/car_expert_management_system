<div class="mt-3 border border-black p-3">
    <form class="form-group"  wire:submit.preventDefault="render">
        <div class="input-group">
          <input class="form-control form-control-bold form-control-lg" autocomplete="off" wire:model="search_problem" type="search" name="search_problem" placeholder="Enter Car Problem here..." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-dark" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
    </form>
    <div class="text-danger" wire:loading>Searching results......</div>
    @if(count($problems) != 0)
    <div class="card align-content-between text-justify  text-amazon" wire:loading.remove>
        @foreach ($problems as $problem)
            <div class="card-header text-bold text-center m-2"><h4><strong class="text-danger">Car Problem: </strong>{{ $problem->problem_desc }}</h4></div>
            <div class="card-body"><blockquote>{{ $problem->soln }}</blockquote></div>
        @endforeach
    </div>
    @else
    <div class="alert alert-danger">{{ "Oops! No Problem Related to your Problem you Try to get problem, Please contact Expert for Further help" }} <a href="{{ route('login') }}"><br>{{ "Click Here For Further Help" }}</a></div>
    @endif
</div>
