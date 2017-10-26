
@extends('layouts.layout_')

@section('content')

@include('components._message')




<div class="row">
	<a href="{{route('student.create')}}">
		<button type="button" class="btn btn-primary btn-rounded-deep" id="btn-m"><i class="fa fa-plus"></i>&nbsp;เพิ่ม</button>
	</a>
</div>
@foreach($student2 as $s2)
<div class="text-danger">
	ท่านยังไม่ได้ใส่เกรด {{$s2->NAME}} เทอม {{$s2->SEMESTER}}
</div>

@endforeach

<!-- semester1 -->
<div class="card">
	<div class="card-header">เทอม 1</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ชื่อวิชา</th>
				<th>หน่วยกิจ</th>
				<th>เกรด</th>
			</tr>
		</thead>
		<tbody>
			@foreach($semester1 as $s)
			<tr>
				<th scope="row">{{$loop->index+1}} </th>
				<td>{{$s->NAME}}</td>
				<td>{{$s->CREDIT}}</td>
				<td>{{$s->GRADE}}</td>
				<td>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-{{$s->SID}}">แก้ไข</button> &nbsp;&nbsp;

					<form action="{{route('student.destroy',$s->SID)}}"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
					</form>
				</td>
				<div class="modal" id="myModal-{{$s->SID}}" role="dialog">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">แก้ไขเกรด</h4>
							</div>
							<div class="modal-body">
								<form action="{{route('student.update',$s->SID)}}" method="post" id="add-form-{{$s->SID}}" >
									{{csrf_field()}}
									{{method_field('PATCH')}}
									ชื่อวิชา : <span >{{$s->NAME}}</span><br><br>
									เกรด : <select id="custom-select" class="" name="grade">
										<option value="{{$s->GRADE}}" selected="true">{{$s->GRADE}}</option>
										@foreach($grade as $g)
										<option value="{{$g->GRADE_NAME}}" name=grade[]>{{$g->GRADE_NAME}}</option>
										@endforeach
									</select>
								</form>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" onclick="$('#add-form-{{$s->SID}}').submit()">Save changes</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="card-group">
		<div class="card">
			<div class="card-block text-xs-center">
				<h4 class="mb-0"><strong>GPA</strong></h4>
			</div>
		</div>
		<div class="card">
			<div class="card-block text-xs-center">
				@if($gpa->total_credit != 0)
				<h4 class="text-success mb-0"><strong>{{ number_format($s1_gpa2->total_all / $s1_gpa->total_credit,2)}}</strong></h4>
				@endif
			</div>
		</div>
	</div>


	<!-- End semester1 -->

	<!-- semester2 -->
	<div class="card">
		<div class="card-header">เทอม 2</div>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อวิชา</th>
					<th>หน่วยกิจ</th>
					<th>เกรด</th>
				</tr>
			</thead>
			<tbody>
				@foreach($semester2 as $s)
				<tr>
					<th scope="row">{{$loop->index+1}} </th>
					<td>{{$s->NAME}}</td>
					<td>{{$s->CREDIT}}</td>
					<td>{{$s->GRADE}}</td>
					<td>
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-{{$s->SID}}">แก้ไข</button> &nbsp;&nbsp;

						<form action="{{route('student.destroy',$s->SID)}}"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
						</form>
					</td>
					<div class="modal" id="myModal-{{$s->SID}}" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">แก้ไขเกรด</h4>
								</div>
								<div class="modal-body">
									<form action="{{route('student.update',$s->SID)}}" method="post" id="add-form-{{$s->SID}}" >
										{{csrf_field()}}
										{{method_field('PATCH')}}
										ชื่อวิชา : <span >{{$s->NAME}}</span><br><br>
										เกรด : <select id="custom-select" class="" name="grade">
											<option value="{{$s->GRADE}}" selected="true">{{$s->GRADE}}</option>
											@foreach($grade as $g)
											<option value="{{$g->GRADE_NAME}}" name=grade[]>{{$g->GRADE_NAME}}</option>
											@endforeach
										</select>
									</form>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary" onclick="$('#add-form-{{$s->SID}}').submit()">Save changes</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="card-group">
			<div class="card">
				<div class="card-block text-xs-center">
					<h4 class="mb-0"><strong>GPA</strong></h4>
				</div>
			</div>
			<div class="card">
				<div class="card-block text-xs-center">
					@if($gpa->total_credit != 0)
					<h4 class="text-success mb-0"><strong>{{ number_format($s2_gpa2->total_all / $s2_gpa->total_credit,2)}}</strong></h4>
					@endif
				</div>
			</div>
		</div>
		<!-- End semester2 -->

		<!-- All semester -->
		<div class="card">
			<div class="card-header">รวมทุกเทอม</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อวิชา</th>
						<th>หน่วยกิจ</th>
						<th>เกรด</th>
						<th>เทอม</th>
					</tr>
				</thead>
				<tbody>
					@foreach($student as $s)
					<tr>
						<th scope="row">{{$loop->index+1}} </th>
						<td>{{$s->NAME}}</td>
						<td>{{$s->CREDIT}}</td>
						<td>{{$s->GRADE}}</td>
						<td>{{$s->SEMESTER}}</td>
						<td>
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-{{$s->SID}}">แก้ไข</button> &nbsp;&nbsp;

							<form action="{{route('student.destroy',$s->SID)}}"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
							</form>
						</td>
						<div class="modal" id="myModal-{{$s->SID}}" role="dialog">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">แก้ไขเกรด</h4>
									</div>
									<div class="modal-body">
										<form action="{{route('student.update',$s->SID)}}" method="post" id="add-form-{{$s->SID}}" >
											{{csrf_field()}}
											{{method_field('PATCH')}}
											ชื่อวิชา : <span >{{$s->NAME}}</span><br><br>
											เกรด : <select id="custom-select" class="" name="grade">
												<option value="{{$s->GRADE}}" selected="true">{{$s->GRADE}}</option>
												@foreach($grade as $g)
												<option value="{{$g->GRADE_NAME}}" name=grade[]>{{$g->GRADE_NAME}}</option>
												@endforeach
											</select>
										</form>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" onclick="$('#add-form-{{$s->SID}}').submit()">Save changes</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="card-group">
				<div class="card">
					<div class="card-block text-xs-center">
						<h4 class="mb-0"><strong>GPA</strong></h4>
					</div>
				</div>
				<div class="card">
					<div class="card-block text-xs-center">
						@if($gpa->total_credit != 0)
						<h4 class="text-success mb-0"><strong>{{ number_format($gpa2->total_all / $gpa->total_credit,2)}}</strong></h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- All semester -->
@endsection