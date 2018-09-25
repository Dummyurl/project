<?php //dd($exist); ?>
<!DOCTYPE html>
<html>
<head>
<style>
table.paleBlueRows {
  font-family: "Times New Roman", Times, serif;
  border: 1px solid #FFFFFF;
  width: 100%;
  height: 100%;
  text-align: center;
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 1px solid #FFFFFF;
  padding: 10px 15px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
}
table.paleBlueRows tr:nth-child(even) {
  background: #D0E4F5;
}
table.paleBlueRows thead {
  background: #0B6FA4;
  border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #FFFFFF;
}
table.paleBlueRows thead th:first-child {
  border-left: none;
}

table.paleBlueRows tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #333333;
  background: #D0E4F5;
  border-top: 3px solid #444444;
}
table.paleBlueRows tfoot td {
  font-size: 14px;
}
.button {
  background-color: Crimson;  
  border-radius: 5px;
  color: white;
  padding: .5em;
  text-decoration: none;
}

.button:focus,
.button:hover {
  background-color: FireBrick;
  color: White;
}

.content {
  display: none;
  margin: 1em 0;
}

.content.active,
.no-js .content {
  display: block;
}
</style>
</head>
<body>

@if(Session::has('message'))
	<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
<br>
<a href="saved_course" _target="blank" class="button js-button" role="button">View Saved Course</a>
<br>
<br>
<table class="paleBlueRows">
<thead>
	<tr>
		<th>Course Id</th>
		<th>Course Name</th>
		<th>Course Type</th>
		<th>Action</th>
	</tr>
</thead>
<tfoot>
	<tr>
	
	</tr>
</tfoot>
<tbody>
	
<?php $count = count($data['elements']);
for($i=0 ;$i<$count; $i++) {?>
	<tr>
		<td><?php echo $data['elements'][$i]['id']; ?></td>
		<td><?php echo $data['elements'][$i]['name']; ?></td>
		<td><?php echo $data['elements'][$i]['courseType']; ?></td>
		<td>
			@if(!in_array($data['elements'][$i]['id'],$exist))
			<a href="{{ URL::to('save_course/'.$i) }}" class="button js-button" role="button">Save</a>
			@else
			Saved
			@endif
		</td>
	</tr>
<?php } ?>

</tbody>
</table>
</body>
</html>
