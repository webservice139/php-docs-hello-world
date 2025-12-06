<script>
function filter_rows() {
  // always filter all rows and all columns
  var rows = [...document.querySelectorAll("#tableid tbody>tr")]
  var ths = [...document.querySelectorAll("#tableid thead th")]

  for (let i = 0; i < rows.length; i++) {
    var row = rows[i]
    let cols = [...row.querySelectorAll("td")]
    willHideRow = false
    
    for (let j = 0; j < cols.length; j++) {
      var th = ths[j]
      var chkNone = th.querySelector("[data-filter=None]").checked
      var chkAll = th.querySelector("[data-filter=All]").checked

      // to avoid paradox
      if (chkNone && chkAll || !chkNone && !chkAll) {
        continue;
      }

      if (chkAll) {
        if (cols[j].innerText == "" || cols[j].innerText == "-" || cols[j].innerText == "\n") {
          willHideRow = true
          break
        }
      }
      if (chkNone) {
        if (cols[j].innerText != "" && cols[j].innerText != "-" && cols[j].innerText != "\n") {
          willHideRow = true
          break
        }
      }
    }
    
    if (willHideRow) {
      row.style.display = 'none'
    } else {
      row.style.display = ''
    }
  }

}


table = document.getElementById('tableid')
hashmapOfoptions = {}

function getUniqueValuesFromColumn() {

  let unique_col_values_dict = {}
  let header = table.rows[0].cells
  let rows = table.rows;
  for (let i = 0; i < header.length; i++) {
    unique_col_values_dict[i] = new Array("All")
    unique_col_values_dict[i].push("None")


    header[i].innerHTML += `<form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes('checkbox${i}')"><select><option></option></select><div class="overSelect"></div></div><div class = "checkboxes" id="checkbox${i}"></div></div></form>`
    options = ""
    for (let j = 0; j < unique_col_values_dict[i].length; j++) {
      options += `<label><input type="checkbox" data-filter="${unique_col_values_dict[i][j]}" checked = "true" onchange="filter_rows(${i},'checkbox${i}')" />${unique_col_values_dict[i][j]}</label>`
    }
    document.getElementById(`checkbox${i}`).innerHTML = options
  }

}

let expanded = false;

function showCheckboxes(elementID) {
  let checkboxes = document.getElementById(elementID);
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}



</script>

<style>
* {
  margin: 0px;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.heading {
  display: flex;
  background-color: #232f3e;
  box-shadow: 0px 1px 2px #232f3e;
}

h1 {
  color: coral;
  font-weight: bold;
  background: transparent;
  padding: 7px;
}

.outer-wrapper {
  margin-top: 40px;
  margin-left: 20px;
  margin-right: 20px;
  border: 1px solid black;
  border-radius: 4px;
  box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.9);
  max-width: fit-content;
  max-height: fit-content;
}

.table-wrapper {
  overflow-y: scroll;
  overflow-x: scroll;
  height: fit-content;
  max-height: 66.4vh;
  margin-top: 22px;
  margin: 15px;
  padding-bottom: 20px;
}

table {
  min-width: max-content;
  border-collapse: separate;
  border-spacing: 0px;
}

.table-filter {
  border-radius: 5px;
}

table th {
  position: sticky;
  top: 0px;
  background-color: #133b5c;
  color: rgb(241, 245, 179);
  text-align: center;
  font-weight: normal;
  font-size: 18px;
  outline: 0.7px solid black;
  border: 1.5px solid black;
}

table th,
table td {
  padding: 15px;
  padding-top: 10px;
  padding-bottom: 10px;
}

table td {
  text-align: left;
  font-size: 15px;
  border: 1px solid rgb(177, 177, 177);
  padding-left: 20px;
}

.multiselect {
  width: 100%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

.checkboxes {
  display: none;
  border: 1px #dadada solid;
}

.checkboxes label {
  display: block;
}
</style>

<table id="tableid">
  <thead>
    <tr>
      <th col-index=1>Employee ID</th>
      <th col-index=2>Gender
      </th>

      <th col-index=3>Department

      </th>
      <th col-index=4>Status
      </th>
      <th col-index=5>Office

      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>101</td>
      <td></td>
      <td>RnD</td>
      <td>Online</td>
      <td>Site 1</td>
    </tr>
    <tr>
      <td>102</td>
      <td>-</td>
      <td>RnD</td>
      <td>On Leave</td>
      <td>Site 1</td>
    </tr>
    <tr>
      <td>103</td>
      <td>-</td>
      <td>RnD</td>
      <td>Online</td>
      <td>Site 1</td>
    </tr>
    <tr>
      <td>104</td>
      <td><br></td>
      <td>-</td>
      <td>Online</td>
      <td>Site 1</td>
    </tr>
    <tr>
      <td>201</td>
      <td>F</td>
      <td>Engineering</td>
      <td>On Leave</td>
      <td>Site 2</td>
    </tr>
    <tr>
      <td>202</td>
      <td>F</td>
      <td><br></td>
      <td>Online</td>
      <td>Site 2</td>
    </tr>
    <tr>
      <td>203</td>
      <td>M</td>
      <td>Engineering</td>
      <td>Online</td>
      <td>Site 2</td>
    </tr>
    <tr>
      <td>204</td>
      <td>M</td>
      <td>Design</td>
      <td>Online</td>
      <td>Site 2</td>
    </tr>
    <tr>
      <td>301</td>
      <td>F</td>
      <td>Support</td>
      <td>Online</td>
      <td>Site 3</td>
    </tr>
    <tr>
      <td>302</td>
      <td>F</td>
      <td>Support</td>
      <td>Online</td>
      <td>Site 3</td>
    </tr>
    <tr>
      <td>303</td>
      <td>M</td>
      <td>-</td>
      <td>Terminated</td>
      <td>Site 3</td>
    </tr>
    <tr>
      <td>304</td>
      <td>M</td>
      <td></td>
      <td>On Leave</td>
      <td>Site 3</td>
    </tr>
    <tr>
      <td>307</td>
      <td>M</td>
      <td></td>
      <td>On Leave</td>
      <td>Site 3</td>
    </tr>
    <tr>
      <td>404</td>
      <td>M</td>
      <td>-</td>
      <td>On Leave</td>
      <td>Site 3</td>
    </tr>


  </tbody>
</table>