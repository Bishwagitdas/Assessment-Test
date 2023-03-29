@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>List Of Data</b></div>
			<div class="col col-md-6">
				<a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">Add New Info</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
                <th class="text-center">ID</th>
				<th class="text-center">Name</th>
				<th class="text-center">Email</th>
                <th class="text-center">Image</th>
				<th class="text-center">Gender</th>
                <th class="text-center">Skills</th>
				<th class="text-center">Action</th>
			</tr>
			@if(count($data) > 0)
            
				@foreach($data as $row)

					<tr>
                        <td class="text-center">{{ $row->id }}</td>
						<td class="text-center">{{ $row->student_name }}</td>
						<td class="text-center">{{ $row->student_email }}</td>
                        <td class="text-center"><img src="{{ asset('images/' . $row->student_image) }}" width="75" /></td>
						<td class="text-center">{{ $row->student_gender }}</td>
                        <td class="text-center">

                          @php
                            $student_skills = json_decode($row->student_skills)
                          @endphp

                          @foreach ($student_skills as $student_skill )
                          {{$student_skill}},
                          @endforeach

                        </td>
						<td class="text-center">
							<form method="post" action="{{ route('students.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('students.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('students.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>

						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="7" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
        {!! $data->links() !!}
	</div>
</div>

@endsection
