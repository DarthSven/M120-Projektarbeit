<?php

?>

<div class="OuterDiv">
    <div class="center">
        <h2>Bitte geben Sie Ihre Verbindungsinformationen ein. </h2>
        <form>

            <div class="form-row">
                <div class="col">
                    <label for="Abfahrt">Abfahrt</label>
                    <input type="text" class="form-control" required placeholder="Frauenfeld" id="Abfahrt">
                </div>
                <div class="col">
                    <label for="Ankunft">Ankunft</label>
                    <input type="text" class="form-control" required placeholder="Wil" id="Ankunft">
                </div>
                <div class="col">
                    <label for="Time">Abfahrtszeit</label>
                    <input type="datetime-local" class="form-control" id="Time" required step="300">

                </div>
            </div>

        </form>
            
    </div>
</div>

