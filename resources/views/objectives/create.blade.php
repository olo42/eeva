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
                    <form class="form-horizontal" method="POST" action="{{ action('ObjectiveController@store', $employee) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('objective') ? ' has-error' : '' }}">
                            
                            <div class="col-md-12">
                                <label for="objective" class="control-label">Objectives</label>   
                                <textarea id="objective" class="form-control" rows="5" name="objective" 
                                    value="{{ old('objective') }}" required></textarea>

                                @if ($errors->has('objective'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="yes" name="send_objectives_to_employee" id="send_objectives">
                                    <label class="form-check-label" for="send_objectives">
                                        Do you want to send a copy of the <u>objectives to the employee</u>?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="evaluate" type="checkbox" value="1" 
                                    id="evaluate" data-toggle="collapse" data-target="#show_hide">
                                    <label class="form-check-label" for="evaluate">
                                        Do you want to evaluate the objectives now?
                                    </label>
                                </div>
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-10">
                                <a href="/home" class="btn btn-default">
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