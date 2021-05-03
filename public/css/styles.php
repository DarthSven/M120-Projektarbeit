<?php header("Content-type: text/css"); ?>

<?php
    $fontsize="";
    $textcolor="black";
    $backgroundcolor="white";
    switch ($_COOKIE["size"]){
        case "big":
            $fontsize="larger";
            break;
        case "small":
            $fontsize="smaller";
            break;
        default :
            $fontsize="default";
            break;
    }
    if ($_COOKIE["darkmode"] == "true"){
        $textcolor="white";
        $backgroundcolor="black";
    }
?>
*  {
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
    overflow-y: hidden;
    font-size:<?=$fontsize?> ;
    color : <?=$textcolor?> !important;
    background-color: <?=$backgroundcolor?> !important;
}

.ticketButton:hover {

    transform: scaleX(1.2);

}

.divCenter {
    display: flex;
    justify-content: center;
    align-items: center;

}


a {
    color: black;
    text-decoration: none;
}

a:hover {
    color: <?=$textcolor?>;
}


.center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 3px solid black;
    padding: 10px;
}

.OuterDiv {
    height: 100vh;
    width: 100vw;

}

.OuterDiv2 {
    display: flex;
    justify-content: center;
    align-items: center;
}

#Mehrfahrtenkarte {
    background-image: url("../img/dampflok.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;

}

#HinRueckFahrt {
    background-image: url("../img/japanLok.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;

}

#EinFahrt {
    background-image: url("../img/subway.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;

}


.grid-Container {
    display: grid;
    grid-template-rows: 100px 1fr;
    grid-template-columns: 1fr;
    height: 100vh;
}

.form-part {
    margin: 25px;
    text-align: left;
}

table, th, td, tbody {
    border: 1px solid black;
    border-collapse: collapse;
}

table {
    width: 100%;
}
.p2
{
    padding: 2px;
}
.m2
{
    margin: 2px;
}
#overlay {
    position: fixed;
    display: none;
    width: 60%;
    height: 60%;
    top: 20%;
    left: 20%;
    right: 0;
    bottom: 0;
    z-index: 2;
    border-radius: 50px;
    color: white;
    font-weight: bold;
}
.numbersform {
    margin: 30px;
}