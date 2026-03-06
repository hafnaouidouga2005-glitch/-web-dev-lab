$(document).ready(function(){

$("#addCourse").click(function(){

var row = 
<tr>
<td><input type="text" class="form-control"></td>
<td><input type="number" class="form-control"></td>
<td><input type="number" class="form-control"></td>
<td><button class="btn btn-danger remove">Remove</button></td>
</tr>
;

$("table tbody").append(row);

});

$(document).on("click",".remove",function(){
$(this).closest("tr").remove();
});

});
