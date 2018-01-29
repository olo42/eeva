@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Evaluation Results</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">Employee</div> <div class="col-md-3"><b>{{ $employee->name }}</b></div>
                        <div class="col-md-3">Date</div> <div class="col-md-3"><b>{{ $objective->updated_at }}</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Objective(s)</div> <div class="col-md-9">{{ $objective->objective }}</div>
                    </div>
                    @if($objective->is_evaluated == false)
                    <div class="row">
                        <div class="col-md-12"><br /><b>Evaluation</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><br /><center>The objectives are not evaluated yet!</center></div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12"><br /><b>Evaluation</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Evaluated by</div> <div class="col-md-9"><b>{{ \Auth::user()->name }}</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Objective(s) Evaluations</div> <div class="col-md-9"><b>{{ $objective->evaluation }}</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Comment(s)</div> <div class="col-md-9">{{ $objective->comment }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Exhibits the MCX Core Values</div> <div class="col-md-9"><b>{{ $objective->mcx_core_values }}</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Demonstrates commitment</div> <div class="col-md-9"><b>{{ $objective->personal_development }}</b></div>
                    </div>
                    @endif
                    <div class="row">
                    <div class="col-md-2 col-md-offset-9"><br /><a href="/home" class="btn btn-primary">Evaluate another employee</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection