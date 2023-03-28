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

@php
$student_skills = json_decode($student->student_skills)
@endphp
<div class="card">
	<div class="card-header">Edit Information
        <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
    </div>
	<div class="card-body">

		<form method="post" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Name: </label>
				<div class="col-sm-10">
					<input type="text" name="student_name" class="form-control" value="{{ $student->student_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email: </label>
				<div class="col-sm-10">
					<input type="text" name="student_email" class="form-control" value="{{ $student->student_email }}" />
				</div>
			</div>
            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image: </label>
				<div class="col-sm-10">
					<input type="file" name="student_image" />
					<br />
					<img src="{{ asset('images/' . $student->student_image) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_student_image" value="{{ $student->student_image }}" />
				</div>
			</div>


            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Gender: </label>
                <div class="col-sm-10">
                 <div class="form-group">
                    <label><input type="radio" name="student_gender" value="Male"
                     <?php if($student->student_gender=="Male"){echo "checked";} ?>
                    > Male</label>
                    <label><input type="radio" name="student_gender" value="Female"
                    <?php if($student->student_gender=="Female"){echo "checked";} ?>
                    > Female</label>
                 </div>
                </div>
			</div>
            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Skills: </label>
                <div class="col-sm-10">
                 <div class="form-group">
                    <label><input type="checkbox" name="student_skills[]" value="laravel"
                     {{in_array('laravel',$student_skills)? 'checked':'' }}
                     >Laravel</label>

                    <label><input type="checkbox" name="student_skills[]" value="Codeigniter"
                     {{in_array('Codeigniter',$student_skills)? 'checked':'' }}
                    > Codeigniter</label>

                    <label><input type="checkbox" name="student_skills[]" value="Ajax"
                    {{in_array('Ajax',$student_skills)? 'checked':'' }}
                    > Ajax</label>

                    <label><input type="checkbox" name="student_skills[]" value="VUE JS"
                    {{in_array('VUE JS',$student_skills)? 'checked':'' }}
                    > VUE JS</label>

                    <label><input type="checkbox" name="student_skills[]" value="MySQL"
                     {{in_array('MySQL',$student_skills)? 'checked':'' }}
                    > MySQL</label>

                    <label><input type="checkbox" name="student_skills[]" value="API"
                     {{in_array('API',$student_skills)? 'checked':'' }}
                    > API</label>

                 </div>
                </div>
			</div>

			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $student->id }}" />
				<input type="submit" class="btn btn-primary" value="Update" />
			</div>
		</form>
	</div>
</div>
<script>
document.getElementsByName('student_gender')[1][0].value = "{{ $student->student_gender }}";
</script>

@endsection('content')
