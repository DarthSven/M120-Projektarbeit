<div class="d-flex justify-content-center">
<div>

    <h2>Mögliche Verbindungen: </h2>
    <p>Abfahrtsort: <?= $data["von"] ?><br>
        Ankunftsort: <?= $data["nach"] ?><br>
        Abfahrtszeit: <?= $data["time"] ?></p>

    <div id="verbindungenDiv">
        <h1>Lade Verbindungen... <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif"
                                      height="50px"></h1>

    </div>
</div>

</div>

<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Passagiere</h5>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Erwachsene</label><br>
                    <input type="number" value="0" id="erwachsene" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label>Kinder / Halbtax</label><br>
                    <input type="number" value="0" id="kinder" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label>Hunde</label><br>
                    <input type="number" value="0" id="hunde" class="form-control"><br>
                </div>
                <div class="form-group">
                    <input type="hidden" value="0" id="ankunftInput" class="form-control"><br>
                    <input type="hidden" value="0" id="abfahrtInput" class="form-control"><br>
                </div>
                <div class="form-group">
                    <input type="hidden" value="0" id="abfahrtsort" class="form-control"><br>
                    <input type="hidden" value="0" id="ankunftsort" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="GoToFinishPage()" class="btn btn-primary">Weiter</button>
                <button type="button"  data-dismiss="modal" class="btn btn-secondary" >Zurück</button>
            </div>
        </div>

    </div>

</div>

<script>
    function GoBack() {
        $("#overlay").hide();

    }

    function GoToFinishPage() {
        window.location.href = "../../../Ticket/" + $("#abfahrtsort")[0].value + "/" + $("#ankunftsort")[0].value + "/" + $("#abfahrtInput")[0].value + "/" + $("#ankunftInput")[0].value + "/" + $("#erwachsene")[0].value + "/" + $("#kinder")[0].value + "/" + $("#hunde")[0].value
    }

    $.ajax({
        url: "http://transport.opendata.ch/v1/connections?from=<?=$data["von"]?>&to=<?=$data["nach"]?>&time=<?=$data["time"]?>",
        success: function (result) {


            let table = '<table class="table table-striped"><thead><th scope="col">Von</th><th scope="col">Bis</th><th scope="col">Abfahrtszeit</th><th scope="col">Ankunftszeit</th><th scope="col">Kaufen</th> </thead><tbody>';
            result.connections.forEach(connection => {
                console.log(connection);
                let abfahrtTimestamp = new Date(connection.from.departure).getTime();
                let ankunftTimestamp = new Date(connection.to.arrival).getTime();
                let abfahrt = new Date(connection.from.departure).toLocaleString();
                let ankunft = new Date(connection.to.arrival).toLocaleString();

                let colAbfahrt = '<td>' +  abfahrt + '</td>';
                let colAnkunft = '<td>' +  ankunft + '</td>';
                let colFrom = '<td>' + connection.from.location.name + '</td>';
                let colTo = '<td>' + connection.to.location.name + '</td>';
                let onClickFunction = "'kaufen(" + abfahrtTimestamp + ", " + ankunftTimestamp + ', "' + connection.from.location.name + '", "' + connection.to.location.name + "\")'";
                let buttonBuy = '<td><button data-toggle="modal" data-target="#myModal" class="btn" onclick='+onClickFunction +'>Kaufen</button></td>';
             //   table = table + "<tr><td>" + connection.from.location.name + "</td><td>" + connection.to.location.name + "</td><td>" + abfahrt + "</td><td>" + ankunft + "</td><td><button class='p2 m2 btn btn-primary' onclick='kaufen(" + abfahrtTimestamp + ", " + ankunftTimestamp + ', "' + connection.from.location.name + '", "' + connection.to.location.name + "\")'>Kaufen</button></td><tr/>";

                let row = '<tr>' + colFrom + colTo + colAbfahrt + colAnkunft + buttonBuy+ '</tr>';
                table += row;

            });
            table += '</tbody></table>';
            $("#verbindungenDiv").empty();
            $("#verbindungenDiv").append(table);


        }
    });

    function kaufen(abfahrt, ankunft, aOrt, bOrt) {
        $("#ankunftInput").val(ankunft);
        $("#abfahrtInput").val(abfahrt);
        $("#abfahrtsort").val(aOrt);
        $("#ankunftsort").val(bOrt);


    }
</script>

