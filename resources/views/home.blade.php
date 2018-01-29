@extends('layouts.app')
@section('styles')
<style>
.dropdown-menu {
	position:absolut;
	width:100%;
	top: 40px !important;
    left: 0px !important;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Find or add employee</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('objectives.create') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
	                                     

                                <input id="email" type="email" class="form-control typeahead twitter-typeahead" 
                                data-provide="typeahead" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required  autocomplete="off">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <a href="#" class="btn btn-default" style="visibility: hidden">
                                    Show older objectives
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Add objectives
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

@section('scriptIncludes')
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
@endsection

@section('scripts')
var $input = $(".typeahead");
	$input.typeahead({
        minLength: 2,
        delay: 400,
        source: function (query, process) {
            $.ajax({
                url: '/employees/get/',
                    data: {email: query},
                    dataType: 'json'
                })
                .done(function(response) {
                    $("#name").val('');
                    $.each (response, function() {
                        this.origin_name  = this.name;
                        this.name = this.email;
                    });
                    console.log(response);
                    return process(response);
                });
        },
	    autoSelect: true,
        afterSelect: function(item){
            console.log(item);
            $("#name").val(item.origin_name);
        }
	});
@endsection
