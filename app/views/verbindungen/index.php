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
<script>
    $.ajax({
        url: "http://transport.opendata.ch/v1/connections?from=<?=$data["von"]?>&to=<?=$data["nach"]?>&time=<?=$data["time"]?>",
        success: function (result) {


            let table = "<table><thead><tr><th>Von</th><th>Bis</th><th>Abfahrtszeit</th><th>Ankunftszeit</th><th>Kaufen</th><tr/></thead></tbody>";
            result.connections.forEach(connection => {
                console.log(connection);
                let abfahrt = new Date(connection.from.departure).toLocaleString();
                let ankunft = new Date(connection.to.arrival).toLocaleString();
                table = table + "<tr><td>" + connection.from.location.name + "</td><td>" + connection.to.location.name + "</td><td>" + abfahrt + "</td><td>" + ankunft + "</td><td><a class='p2 m2 btn btn-primary'>Kaufen</a></td><tr/>";

            });
            table = table + "</tbody>"
            $("#verbindungenDiv").empty();
            $("#verbindungenDiv").append(table);


        }
    });
</script>

