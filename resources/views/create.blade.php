@extends('master')
@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add New Information
        <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
    </div>

	<div class="card-body">
		<form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Name: </label>
				<div class="col-sm-10">
					<input type="text" name="student_name" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email: </label>
				<div class="col-sm-10">
					<input type="text" name="student_email" class="form-control" />
				</div>
			</div>
            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image: </label>
				<div class="col-sm-10">
					<input type="file" name="student_image" />
				</div>
			</div>
			{{-- <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Gender: </label>
				<div class="col-sm-10">
					<select name="student_gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
			</div> --}}

            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Gender: </label>
                <div class="col-sm-10">
                 <div class="form-group">
                    <label><input type="radio" name="student_gender" value="Male"> Male</label>
                    <label><input type="radio" name="student_gender" value="Female"> Female</label>
                 </div>
                </div>
			</div>

            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Skills: </label>
                <div class="col-sm-10">
                 <div class="form-group">
                    <label><input type="checkbox" name="student_skills[]" value="laravel"> Laravel</label>
                    <label><input type="checkbox" name="student_skills[]" value="Codeigniter"> Codeigniter</label>
                    <label><input type="checkbox" name="student_skills[]" value="Ajax"> Ajax</label>
                    <label><input type="checkbox" name="student_skills[]" value="VUE JS"> VUE JS</label>
                    <label><input type="checkbox" name="student_skills[]" value="MySQL"> MySQL</label>
                    <label><input type="checkbox" name="student_skills[]" value="API"> API</label>
                 </div>
                </div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Submit" />
			</div>
		</form>
	</div>
</div>

@endsection('content')
