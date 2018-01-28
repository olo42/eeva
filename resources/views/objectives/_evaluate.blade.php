
<div class="form-group{{ $errors->has('evaluation') ? ' has-error' : '' }}">
                            
    <label for="evaluation">Objective(s) Evaluations</label>
    <select class="form-control" id="evaluation">
        <option value="">Please select...</option>
        <option value="Unacceptable performance">Unacceptable performance</option>
        <option value="Marginally meets performance requirements">Marginally meets performance requirements</option>
        <option value="Meets performance requirements">Meets performance requirements</option>
        <option value="Exceeds performance requirements">Exceeds performance requirements</option>
        <option value="Significantly exceeds performance requirements">Significantly exceeds performance requirements</option>
    </select>

</div>

<div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                            
    <label for="comments" class="control-label">Comments</label>   
    <textarea id="comments" class="form-control" rows="5" name="comments" value="{{ old('comments') }}"></textarea>

    @if ($errors->has('comments'))
        <span class="help-block">
            <strong>{{ $errors->first('comments') }}</strong>
        </span>
    @endif

</div>

<div class="form-group">
    <hr>
    <p>IN ADDITION TO THE OBJECTIVE(S) OUTLINED ABOVE, MCX EMPLOYEES ARE EXPECTED TO EXHIBIT THE MCX CORE VALUES AND DEMONSTRATE A COMMITMENT TO PERSONAL DEVELOPMENT.</p>
</div>

<div class="form-group{{ $errors->has('mcx_core_values') ? ' has-error' : '' }}">
                            
    <label for="mcx_core_values">Does this employee exhibit the MCX Core Values of Creativity, Innovation, Transparency, Integrity, Diligence, and Employee Happiness? *</label>
    <div class="form-check">
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
                            
    <label for="personal_development">Does this employee exhibit the MCX Core Values of Creativity, Innovation, Transparency, Integrity, Diligence, and Employee Happiness? *</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="personal_development" id="personal_development1" value="yes">
        <label class="form-check-label" for="personal_development_yes">
            Yes
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="personal_development" id="personal_development0" value="no">
        <label class="form-check-label" for="personal_development_no">
            No
        </label>
    </div>
    
</div>

<div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="send_objectives">
        <label class="form-check-label" for="send_objectives">
            Do you want to send a copy of the <u>evaluation to the employee</u>?
        </label>
    </div>
</div>
