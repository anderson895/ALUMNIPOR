function searchTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let table = document.getElementById("campusTable");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { 
        let cols = rows[i].getElementsByTagName("td");
        let found = false;
        
        for (let j = 1; j < cols.length - 1; j++) { // Skip the first and last column
            if (cols[j].innerText.toLowerCase().includes(input)) {
                found = true;
                break;
            }
        }
        
        rows[i].style.display = found ? "" : "none";
    }
}