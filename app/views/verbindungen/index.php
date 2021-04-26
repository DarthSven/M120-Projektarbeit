<div class="OuterDiv">
    <div class="center">
        <h2>Mögliche Verbindungen: </h2>
        <p>Abfasfahrtssinort: <?= $data["von"] ?><br>
            Ankunftsort: <?= $data["nach"] ?><br>
            Abfahrtszeit: <?= $data["time"] ?></p>

        <div id="verbindungenDiv">
            <h1>Lade Verbindungen...</h1>

        </div>
    </div>
</div>
<script>
    $.ajax({
        url: "http://transport.opendata.ch/v1/connections?from=<?=$data["von"]?>&to=<?=$data["nach"]?>&time=<?=$data["time"]?>",
        success: function (result) {

            $("#verbindungenDiv").empty();
            $("#verbindungenDiv").append("<table>");
            $("#verbindungenDiv").append("<thead>");
            $("#verbindungenDiv").append("<tr><th>Von</th><th>Bis</th><th>Abfahrtszeit</th><th>Ankunftszeit</th></tr>");
            $("#verbindungenDiv").append("</thead>");

            result.connections.forEach(connection => {
                let abfahrt = new Date(connection.from.departure).toLocaleString();
                let ankunft = new Date(connection.to.arrival).toLocaleString();
                console.log(abfahrt);
                console.log(ankunft);
            });
            $("#verbindungenDiv").append("</table>");

        }
    });
</script>

