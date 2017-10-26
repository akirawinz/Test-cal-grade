
@extends('layouts.layout_')

@section('content')
@include('components._error')


<form method="post" action="{{route('student.store')}}" class="form-horizontal">
	<div class="card">
		<div class="card-header">เพิ่มวิชา <small class="text-danger">( * ท่านสามารถเลือกวิชาไว้ก่อนแล้วค่อยมาเพิ่มเกรดทีหลังได้ )</small></div> 
		{{ csrf_field() }}
		<table class="table" id="add-me">
			<select id="custom-select" class="custom-select" name="semester" >
				<option disabled="true" value="choose" selected>เลือกเทอม</option>
				<option  value="1" >1</option>
				<option  value="2" >2</option>
      </select>
			<thead>
				<tr>
					<th width="300">ชื่อวิชา</th>
					<th>เกรด</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<!-- select data from subject table -->
					<td>
						<select id="custom-select" class="form-control custom-select" name="id_s[]" >
							<option disabled="true" value="choose" selected>เลือกวิชา</option>
							@foreach($subject as $s)
		          <option value="{{$s->ID}}" >{{$s->NAME}} / {{$s->CREDIT}} หน่วยกิจ</option>
		          @endforeach
	          </select>
					</td>
					<td>
						<select id="custom-select" class="form-control custom-select" name="grade[]">
						 <option value="N" disabled="true" selected="true">เลือกเกรด</option>
							@foreach($grade as $g)
	            <option value="{{$g->GRADE_NAME}}" name=grade[]>{{$g->GRADE_NAME}}</option>
	            @endforeach
	          </select>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="form-group row mb-0">
	    <div class="offset-sm-3 col-sm-9"  style="margin-bottom: 20px">
	    	<button id="add-form" type="button" class="btn btn-success">เพิ่ม</button>
	      <button type="submit" class="btn btn-primary">บันทึก</button>
	    </div>
	  </div>
	</div>
</form>
@endsection

@section('script')
 <script type="text/javascript">
	var i = 0;
	 var id_i = 1;
	$(document).ready(function() {
		$('#add-form').click(function() {
			i++;
			id_i++;						
			$('#add-me').append(
				'<tr>'+
				'<td>'+
				'<select id="custom-select" name="id_s[]" class="form-control custom-select"><option disabled="true" selected value="choose">เลือกวิชา</option>@foreach($subject as $s)<option value="{{$s->ID}}" >{{$s->NAME}} / {{$s->CREDIT}} หน่วยกิจ</option>@endforeach</select>'
				+'</td>'
				+'<td>'
				+'<select id="custom-select" name="grade[]" class="form-control custom-select"><option value="N" disabled="true" selected="true">เลือกเกรด</option>@foreach($grade as $g)<option value="{{$g->GRADE_NAME}}" name=grade[]>{{$g->GRADE_NAME}}</option>@endforeach</select>'
				+'</td>'
				+'<td>'
				+'<button id="'+i+'" type="button" class="btn btn-danger delegated-btn">Delete</button>'
				+'</td>'
				+'</tr>'
				);

			$('button.btn.btn-danger').click(function() {
				var whichtr = $(this).closest("tr");
				whichtr.remove(); 
			});

		});
	});

</script>

@endsection