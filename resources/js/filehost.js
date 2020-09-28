function keystroke_search() {
    // Declare variables
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("keystroke_searchbox");
    filter = input.value.toUpperCase();
    table = document.getElementById("table-results");
    tr = table.getElementsByTagName("tr");

    // Loop through all rows, hide those that don't match the query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
function copyCommand() {
    /* Get the text field */
    var copyText = document.getElementById("copy-input");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    /* alert("Copied the text: " + copyText.value); */
}
