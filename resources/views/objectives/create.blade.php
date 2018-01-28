@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add objective(s)</div>

                <div class="panel-body">
                    <p>IN A PREVIOUS ONE-ON-ONE MEETING WITH YOUR EMPLOYEE, YOU ESTABLISHED AT LEAST ONE OBJECTIVE 
                    THAT THE EMPLOYEE WOULD BE RESPONSIBLE FOR ACHIEVING BY THE END OF THE FISCAL YEAR. 
                    DESCRIBE AND EVALUATE THE OBJECTIVE(S) HERE.</p>
                    <form class="form-horizontal" method="POST" action="{{ route('objectives.create') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('objectives') ? ' has-error' : '' }}">
                            
                            <div class="col-md-12">
                                <label for="objectives" class="control-label">Objectives</label>   
                                <textarea id="objectives" class="form-control" rows="5" name="objectives" value="{{ old('objectives') }}" required></textarea>

                                @if ($errors->has('objectives'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('objectives') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="evaluate">
                                    <label class="form-check-label" for="evaluate">
                                        Do you want to send a copy of the objectives to the employee?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="evaluate">
                                    <label class="form-check-label" for="evaluate">
                                        Do you want to evaluate the objectives now?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-10">
                                <a href="#" class="btn btn-default">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection