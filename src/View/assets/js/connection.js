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
            let responseText = await response.text();
                responseText = JSON.parse(responseText)
            if(responseText["result"] == true) {
                fetch("/aeroclub/src/Config/json/configWeb.json", {
                    method: "GET",
                }).then(async (dataJson) => {
                    window.location.href = JSON.parse(await dataJson.text())["defaultPath"]+`/profile`;
                })
            } else {
                const errorDiv = document.getElementsByClassName("notification")[0]
                    errorDiv.innerHTML = "<p><i class='fa-solid fa-bug'></i> Problème d'authentification ! Mots de passe ou email incorrect</p>"
                    errorDiv.style = ""
            }
        }
    })
});