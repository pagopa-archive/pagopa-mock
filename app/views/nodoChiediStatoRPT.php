<?php
$IUV="RF".rand(100000000,1000000000);
$CCP=rand(7000,7000000);
$IDM="AGID".rand(10,100)."IDM";
$IMPORTO=rand(0.1,1499);
$DEC=rand(00,99);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pagoPA MOC</title>
    <link rel="stylesheet" href="../css/style.css">
    <!--<script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("numeroVersamenti").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            var i=0;
            for (i=0;i<number;i++){
                //Definisco il Fieldset

                var field = document.createElement("fieldset");
                container.appendChild(document.createElement("br"));
                container.appendChild(field)
                var legend = document.createElement("legend");
                legend.innerHTML = "Dati Singolo Versamento";
                //Inserisco la legende del fieldset
                field.appendChild(legend);


                //Inserisco i parametri della RPT

                //importoSingoloVersamento
                field.appendChild(document.createTextNode("importoSingoloVersamento: "));
                var input = document.createElement("input");
                input.id = "importoSingoloVersamento" + i;
                input.type = "text";
                input.name = "importoSingoloVersamento" + i;
                input.value = "<?php echo "$IMPORTO.$DEC"?>";
                field.appendChild(input);
                field.appendChild(document.createElement("br"));

                //ibanAccredito
                field.appendChild(document.createTextNode("ibanAccredito: "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "ibanAccredito" + i;
                input.value = "IT30N0103076271000001823603";
                field.appendChild(input);
                field.appendChild(document.createElement("br"));

                //ibanAppoggio
                field.appendChild(document.createTextNode("ibanAppoggio: "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "ibanAppoggio" + i;
                input.value = "IT57N0760114800000011050036";
                field.appendChild(input);
                field.appendChild(document.createElement("br"));

                //credenzialiPagatore
                field.appendChild(document.createTextNode("credenzialiPagatore: "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "credenzialiPagatore" + i;
                input.value = "n/a";
                field.appendChild(input);
                field.appendChild(document.createElement("br"));

                //causaleVersamento
                field.appendChild(document.createTextNode("causaleVersamento: "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "causaleVersamento" + i;
                input.value = "<?php echo "/RFS/$IUV/$IMPORTO.$DEC"; ?>";
                field.appendChild(input);
                field.appendChild(document.createElement("br"));

                //datiSpecificiRiscossione
                field.appendChild(document.createTextNode("datiSpecificiRiscossione: "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "datiSpecificiRiscossione" + i;
                input.value = "9/abcdefg";
                field.appendChild(input);
                field.appendChild(document.createElement("br"));
            }
                //importoTotaleDaVersare
            var x = document.getElementById('importoSingoloVersamento0');
            var y = document.getElementById('importoSingoloVersamento1');
            var z = document.getElementById('importoSingoloVersamento2');
            var k = document.getElementById('importoSingoloVersamento3');
            var w = document.getElementById('importoSingoloVersamento4');
            switch (i) {
                case 1:
                    document.getElementById('importoTotaleDaVersare').value = parseFloat("0" + x.value);
                    break;
                case 2:
                    document.getElementById('importoTotaleDaVersare').value = parseFloat("0" + x.value)+ parseFloat("0" + y.value);
                    break;
                case 3:
                    document.getElementById('importoTotaleDaVersare').value = parseFloat("0" + x.value)+ parseFloat("0" + y.value)+ parseFloat("0" + z.value);
                    break;
                case 4:
                    document.getElementById('importoTotaleDaVersare').value = parseFloat("0" + x.value)+ parseFloat("0" + y.value)+ parseFloat("0" + z.value)+ parseFloat("0" + k.value);
                    break;
                case 5:
                    document.getElementById('importoTotaleDaVersare').value = parseFloat("0" + x.value) + parseFloat("0" + y.value)+ parseFloat("0" + z.value)+ parseFloat("0" + k.value) + parseFloat("0" + w.value);
                    break;
                default:
                    document.getElementById('importoTotaleDaVersare').value = "NA";
            }
        }


    </script>-->
</head>
<body>
<form action="../actions/actionnodoChiediStatoRPT.php" method="post" autocomplete="off">
    <br>
    <fieldset>
        <legend>Parametri Request nodoChiediStatoRPT</legend>
        <br>
        <fieldset>
            <legend>SOAP Action</legend>
            identificativoUnivocoVersamento: <input type="text" name="identificativoUnivocoVersamento" value=""><br>
	    codiceContestoPagamento: <input type="text" name="codiceContestoPagamento" value=""><br>
       </fieldset>
    </fieldset>
    <input type="submit" value="ChiediStatoRPT">
</form>

</body>
</html>
