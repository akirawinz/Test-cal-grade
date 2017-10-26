
@extends('layouts.layout_')

@section('content')

@include('components._message')

<div class="row">
	<a href="{{route('subject.create')}}">
		<button type="button" class="btn btn-primary btn-rounded-deep" id="btn-m"><i class="fa fa-plus"></i>&nbsp;เพิ่ม</button>
	</a>
</div>

<div class="card">
	<div class="card-header">รายชื่อวิชา</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ชื่อวิชา</th>
				<th>หน่วยกิจ</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($subject as $s)
			<tr>
				<th scope="row">{{$loop->index+1}} </th>
				<td>{{$s->NAME}}</td>
				<td>{{$s->CREDIT}}</td>
				<td>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-{{$s->ID}}">แก้ไข</button> &nbsp;&nbsp;

					<form action="{{route('subject.destroy',$s->ID)}}"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
					</form>
				</td>
				<div class="modal" id="myModal-{{$s->ID}}" role="dialog">
			    <div class="modal-dialog modal-sm">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">แก้ไขชื่อวิชา</h4>
			        </div>
			        <div class="modal-body">
			        <form action="{{route('subject.update',$s->ID)}}" method="post" id="add-form-{{$s->ID}}" >
							{{csrf_field()}}
							{{method_field('PATCH')}}
			          ชื่อวิชา : <input type="text"  name="name" value="{{$s->NAME}}"><br><br>
			          หน่วยกิจ : <input type="text" name="credit" value="{{$s->CREDIT}}">
			          </form>
			        </div>
			        <div class="modal-footer">
			        	<button type="submit" class="btn btn-primary" onclick="$('#add-form-{{$s->ID}}').submit()">Save changes</button>
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			    </div>
			  </div>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection