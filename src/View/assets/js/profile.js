window.addEventListener('load', function() {

    fetch(
        "/aeroclub/src/Ajax/getEXBC.php", 
        {
            method: "POST",
        }
    ).then(async response => {
        const responseText = await response.text();
        try  {
            const json = JSON.parse(responseText);
                if(json.success) {
                    const Balise = document.getElementById("accountTable");
                    let html = ' <table id="example" class="table is-striped" style="width:100%"><thead><tr><th>Description</th><th>Debit</th><th>Credit</th><th>Date</th></tr></thead><tbody>';
                        json.data.forEach(element => {
                            html += `<tr>`;
                                html += `<td>${element["description"]}</td>`
                                html += `<td>${element["debit"]}</td>`
                                html += `<td>${element["credit"]}</td>`
                                html += `<td>${element["date"]}</td>`
                            html += `</tr>`;
                        });
                    html += '</tbody><tfoot><tr><th>Description</th><th>Debit</th><th>Credit</th><th>Date</th></tr></tfoot></table>'
                    Balise.innerHTML = html;
                    $(document).ready( function () {
                        $('#example').DataTable();
                    } );
                } else {

                }
        } catch(e) {

        }
    })

})