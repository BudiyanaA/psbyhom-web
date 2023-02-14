{{ Form::open(['url' => route('register_c.store'), 'class' => 'form-group row' ])}}
@include('register_c._form')
<div class="col-sm-6">
				    
					<div class="form-group">
						<button class="btn btn-default more">Submit</button>
						<p>*required field</p>
					</div>
				</div>
{{ Form::close() }}