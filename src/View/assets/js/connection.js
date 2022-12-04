$("#connectButton").on("click", (event) => {

    const pass = $("#passwordInput").val();
    const mail = $("#emailInput").val();
    const Data = new FormData();
        Data.append('email', mail)
        Data.append("password", pass)
    fetch(
        "/aeroclub/src/Metier/LogicAuth.php",
        {
            method: "POST",
            body: Data
        }
    ).then(async function(response) {
        if(response.ok) {
            console.log(await response.text())
        }
    })
});