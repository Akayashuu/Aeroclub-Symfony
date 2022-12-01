$("#connectButton").on("click", (event) => {

    const pass = $("#passwordInput").val();
    const mail = $("#emailInput").val();
    const Data = {
        email:mail,
        password:pass
    }
    fetch(
        "/aeroclub/src/Metier/LogicAuth.php",
        {
            method:"POST",
            body: JSON.stringify(Data),
        }
    ).then(async function(response) {
        if(response.ok) {
            console.log(await response.text())
        }
    })
});