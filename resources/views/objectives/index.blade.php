@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $employee->name }}'s Objectives</div>
                <div class="panel-body">
                    @if(count($objectives) == 0)
                        <div class="row">
                            <div class="col-md-12"><center><br />No objectives available yet!</center></div>
                        </div>
                    @else
                
                        @foreach($objectives as $objective)
                        <div class="row">
                            <div class="col-md-12"><li><a href="/objectives/{{ $objective->id }}/show/">Evaluation last updated at {{ $objective->updated_at}} </a></div>
                        </div>
                        @endforeach
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