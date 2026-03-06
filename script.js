document.getElementById("addRow").addEventListener("click", function() {

let table = document.getElementById("courseTable");
let row = table.insertRow();

row.innerHTML = 
<td><input type="text" name="course[]" class="form-control"></td>
<td><input type="number" name="credits[]" class="form-control"></td>
<td><input type="number" name="grade[]" step="0.1" class="form-control"></td>
<td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
;

});


