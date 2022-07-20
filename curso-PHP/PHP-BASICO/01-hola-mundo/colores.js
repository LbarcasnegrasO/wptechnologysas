function selectedRow() {
	var index,
		table = document.getElementById("table");

		for (var i = 1; i < table.rows.length; i++) {
			

			table.rows[i].onclick = function(){

				if (typeof index !== "undefined") {
					table.rows[index].classList.toggle("selected");
				}

				// get the selected row index
				index = this.rowIndex;
				// add class selected ti the row
				this.classList.toggle("selected");
				console.log(index);
			};
		}
}

selectedRow();