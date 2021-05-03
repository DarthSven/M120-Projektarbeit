<div class="row mh-100 container">

    <form class="form" method="post">

        <div class="form-group row form-part">
            Font size :

            <?php
           echo ' <select name="fontSize" id="fontSize">
  <option value="big"';
           if($_COOKIE["size"] == "big")
               echo "selected";

            echo '
  
  >BIG</option>
  <option value="medium"';
             if($_COOKIE["size"] == "medium")
                 echo "selected";
            echo '
  
  >MEDIUM</option>
  <option value="small"';
            if($_COOKIE["size"] == "small")
                echo "selected";
            echo  '>SMALL</option>
    
</select>
            ';

            ?>

        </div>
        <div class="row">
            <?php
            if($_COOKIE['darkmode'] == 'true'){
                echo '<button name="lightmode"  class="btn form-part" type="submit"> <i class="far fa-moon fa-5x"></i></button>';
            }else{
                echo '<button  name="darkmode"   class="btn form-part" type="submit"> <i class="fas fa-sun fa-5x"></i></button>';
            }
            ?>

        </div>

        <div class="row">
            <button class="btn form-part" type="submit">Save</button>
        </div>

    </form>
<button class="btn" type="button" onclick="goBack()"  ><i class="far fa-arrow-alt-circle-left fa-5x"></i> </button>

</div>
