@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Evaluate objective(s)</div>

                <div class="panel-body">
                    <p>IN A PREVIOUS ONE-ON-ONE MEETING WITH YOUR EMPLOYEE, YOU ESTABLISHED AT LEAST ONE OBJECTIVE 
                    THAT THE EMPLOYEE WOULD BE RESPONSIBLE FOR ACHIEVING BY THE END OF THE EVALUATION PERIOD. 
                    EVALUATE THE OBJECTIVE(S) HERE.</p>
                    <hr />
                    <p><b>Objectives</b><p>   
                    <p>{{ $objective->objective }}</p> 
                    <hr /> 
                    <form class="form-horizontal" method="POST" action="{{ action('ObjectiveController@update', [$employee, $objective]) }}">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                        <div class="form-group{{ $errors->has('evaluation') ? ' has-error' : '' }}">
                            
                            <label for="evaluation">Objective(s) Evaluations</label>
                            <select class="form-control" name="evaluation" id="evaluation" required>
                                <option value="">Please select...</option>
                                <option value="Unacceptable performance">Unacceptable performance</option>
                                <option value="Marginally meets performance requirements">Marginally meets performance requirements</option>
                                <option value="Meets performance requirements">Meets performance requirements</option>
                                <option value="Exceeds performance requirements">Exceeds performance requirements</option>
                                <option value="Significantly exceeds performance requirements">Significantly exceeds performance requirements</option>
                                <option value="Does not apply anymore">Does not apply anymore</option>
                            </select>
                        
                        </div>
                        
                        <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                                                    
                            <label for="comments" class="control-label">Comments</label>   
                            <textarea id="comments" class="form-control" rows="5" name="comments" value="{{ old('comments') }}" required></textarea>
                        
                            @if ($errors->has('comments'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comments') }}</strong>
                                </span>
                            @endif
                        
                        </div>
                        
                        <div class="form-group">
                            <hr>
                            <p>IN ADDITION TO THE OBJECTIVE(S) OUTLINED ABOVE, MARITZCX EMPLOYEES ARE EXPECTED TO EXHIBIT THE MARITZCX CORE VALUES AND DEMONSTRATE A COMMITMENT TO PERSONAL DEVELOPMENT.</p>
                        </div>
                        
                        <div class="form-group{{ $errors->has('mcx_core_values') ? ' has-error' : '' }}">
                                                    
                            <label for="mcx_core_values">Does this employee exhibit the MaritzCX Core Values?</label>
                            <div class="form-check" required>
                                <input class="form-check-input" type="radio" name="mcx_core_values" id="mcx_core_values_yes" value="yes">
                                <label class="form-check-label" for="mcx_core_values_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mcx_core_values" id="mcx_core_values_no" value="no">
                                <label class="form-check-label" for="mcx_core_values_no">
                                    No
                                </label>
                            </div>
                            
                        </div>
                        
                        <div class="form-group{{ $errors->has('personal_development') ? ' has-error' : '' }}">
                                                    
                            <label for="personal_development">Does this employee demonstrate a commitment to their Personal Development?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="personal_development" id="personal_development_yes" value="yes">
                                <label class="form-check-label" for="personal_development_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="personal_development" id="personal_development_no" value="no">
                                <label class="form-check-label" for="personal_development_no">
                                    No
                                </label>
                            </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('career_aspiration') ? ' has-error' : '' }}">
                                                    
                            <label for="career_aspiration" class="control-label">Career Aspiration Discussion Summary</label>   
                            <textarea id="career_aspiration" class="form-control" rows="5" name="career_aspiration" value="{{ old('career_aspiration') }}" required></textarea>
                        
                            @if ($errors->has('career_aspiration'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('career_aspiration') }}</strong>
                                </span>
                            @endif
                        
                        </div>

                        <div class="form-group{{ $errors->has('training') ? ' has-error' : '' }}">
                                                    
                            <label for="training" class="control-label">Training Wants &amp; Needs</label>   
                            <textarea id="training" class="form-control" rows="5" name="training" value="{{ old('training') }}" required></textarea>
                        
                            @if ($errors->has('training'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('training') }}</strong>
                                </span>
                            @endif
                        
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="send_evaluation_to_employee" value="yes" id="send_evaluation">
                                <label class="form-check-label" for="send_objectives">
                                    Do you want to send a copy of the <u>evaluation to the employee</u>?
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