<div class="row mh-100 container">

    <form class="form" onsubmit="">
        <div class="form-group row form-part">
            Font size :

            <?php
           echo '  <div class="form-check">
                <input class="form-check-input" type="radio" name="fontSizeRadio" id="fontSizeRadioBig"';
           if ($_COOKIE['size'] == "big")echo "checked";
           echo '>
                <label class="form-check-label" for="fontSizeRadioBig">
                    Big
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="fontSizeRadio" id="fontSizeRadioMedium" ';
                if($_COOKIE['size'] == "medium")echo "checked";
                echo '>
                <label class="form-check-label" for="fontSizeRadioMedium">
                    Medium
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="fontSizeRadio" id="fontSizeRadioSmall" ';

            if($_COOKIE['size'] == "small")echo "checked";
            echo '>
                <label class="form-check-label" for="fontSizeRadioSmall">
                    Small
                </label>
            </div>
            ';

            ?>

        </div>
        <div class="row">
            <?php
            if($_COOKIE['darkmode'] == 'true'){
                echo '<button  class="btn form-part" type="button"> <i class="far fa-moon fa-5x"></i></button>';
            }else{
                echo '<button  class="btn form-part" type="button"> <i class="fas fa-moon fa-5x"></i></button>';
            }
            ?>

        </div>

        <div class="row">
            <button class="btn form-part" type="submit"></button>
        </div>

    </form>
<button class="btn" type="button" onclick="goBack()"  ><i class="far fa-arrow-alt-circle-left fa-5x"></i> </button>
</div>
