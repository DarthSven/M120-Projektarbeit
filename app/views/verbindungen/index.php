<div class="OuterDiv2">
    <div style="width: 50%;width: 50%;
    border: 2px solid black;">
        <h2>Mögliche Verbindungen: </h2>
        <p>Abfasfahrtssinort: <?= $data["von"] ?><br>
            Ankunftsort: <?= $data["nach"] ?><br>
            Abfahrtszeit: <?= $data["time"] ?></p>

        <div id="verbindungenDiv">
            <h1>Lade Verbindungen... <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif"
                                          height="50px"></h1>

        </div>
    </div>
</div>
<div id="overlay">
    <form class="numbersform">
        <br>
        <label>Erwachsene</label><br>
        <input type="number" value="0" id="erwachsene" class="form-control"><br>
        <label>Kinder / Halbtax</label><br>
        <input type="number" value="0" id="kinder" class="form-control"><br>
        <label>Hunde</label><br>
        <input type="number" value="0" id="hunde" class="form-control"><br>
        <input type="hidden" value="0" id="ankunftInput" class="form-control"><br>
        <input type="hidden" value="0" id="abfahrtInput" class="form-control"><br>
        <input type="hidden" value="0" id="abfahrtsort" class="form-control"><br>
        <input type="hidden" value="0" id="ankunftsort" class="form-control"><br>
        <div class="forms-button-div">
            <button type="button" class="forms-button btn btn-primary" onclick="GoToFinishPage()">Weiter</button>
            <button type="button" class="forms-button btn btn-secondary" onclick="GoBack()">Zurück</button>
        </div>
    </form>
</div>
<script>
    function GoBack() {
        $("#oberlay").hide();

    }

    function GoToFinishPage() {
        window.location.href = "../../../../Ticket/" + $("#abfahrtsort")[0].value + "/" + $("#ankunftsort")[0].value + "/" + $("#abfahrtInput")[0].value + "/" + $("#ankunftInput")[0].value + "/" + $("#erwachsene")[0].value + "/" + $("#kinder")[0].value + "/" + $("#hunde")[0].value
    }

    $.ajax({
        url: "http://transport.opendata.ch/v1/connections?from=<?=$data["von"]?>&to=<?=$data["nach"]?>&time=<?=$data["time"]?>",
        success: function (result) {


            let table = "<table><thead><tr><th>Von</th><th>Bis</th><th>Abfahrtszeit</th><th>Ankunftszeit</th><th>Kaufen</th><tr/></thead></tbody>";
            result.connections.forEach(connection => {
                console.log(connection);
                let abfahrtTimestamp = new Date(connection.from.departure).getTime();
                let ankunftTimestamp = new Date(connection.to.arrival).getTime();
                let abfahrt = new Date(connection.from.departure).toLocaleString();
                let ankunft = new Date(connection.to.arrival).toLocaleString();
                table = table + "<tr><td>" + connection.from.location.name + "</td><td>" + connection.to.location.name + "</td><td>" + abfahrt + "</td><td>" + ankunft + "</td><td><button class='p2 m2 btn btn-primary' onclick='kaufen(" + abfahrtTimestamp + ", " + ankunftTimestamp + ', "' + connection.from.location.name + '", "' + connection.to.location.name + "\")'>Kaufen</button></td><tr/>";

            });
            table = table + "</tbody>"
            $("#verbindungenDiv").empty();
            $("#verbindungenDiv").append(table);


        }
    });

    function kaufen(abfahrt, ankunft, aOrt, bOrt) {
        $("#ankunftInput").val(ankunft);
        $("#abfahrtInput").val(abfahrt);
        $("#abfahrtsort").val(aOrt);
        $("#ankunftsort").val(bOrt);
        $("#overlay").show();

    }
</script>

