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
            const responseText = await response.text()
            if(responseText) {
                fetch("/aeroclub/src/Config/json/configWeb.json", {
                    method: "GET",
                }).then(async (dataJson) => {
                    window.location.href = JSON.parse(await dataJson.text())["defaultPath"]+`/profile`;
                })
            }
        }
    })
});