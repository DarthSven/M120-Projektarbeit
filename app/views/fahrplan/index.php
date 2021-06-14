<?php
if (isset ($_GET["type"]))
{
    $type = $_GET["type"];
    setcookie("type", $type);
}
?>

<div class="OuterDiv">
    <div class="center">
        <h2>Bitte geben Sie Ihre Verbindungsinformationen ein. </h2>
        <form onsubmit="document.location.href = '../public/Verbindungen/' + this.vom.value + '/' + this.bis.value + '/' + this.zeit.value + ''; return false;"
              method="get">

            <div class="form-row">
                <div class="col">
                    <label for="Abfahrt">Abfahrt</label>
                    <input type="text" class="form-control" required placeholder="Frauenfeld" id="Abfahrt" name="vom">
                </div>
                <div class="col">
                    <label for="Ankunft">Ankunft</label>
                    <input type="text" class="form-control" required placeholder="Wil" id="Ankunft" name="bis">
                </div>
                <div class="col">
                    <label for="Time">Abfahrtszeit</label>
                    <input type="date" class="form-control" id="Time" required name="zeit">

                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2" onclick="submit()">Weiter</button>
            <a href="../" class="btn btn-secondary mt-2">Zurück</a>


        </form>

    </div>
</div>

