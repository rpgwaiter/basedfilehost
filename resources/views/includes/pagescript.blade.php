<script>
    document.querySelectorAll('#table-results th.sortable').forEach(th => th.addEventListener('click', (() => {
        const table = th.closest('table');
        Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
            .sort(comparer(Array.from(th.parentNode.children)
                .indexOf(th), this.asc = !this.asc))
            .forEach(tr => table.appendChild(tr) );
    })));

    document.querySelectorAll("#table-results td:nth-child(3).size").forEach(size => {
        size.innerText = filesize(size.innerText);
    });

</script>
