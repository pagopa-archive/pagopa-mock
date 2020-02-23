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
    <script type='text/javascript'>
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


    </script>
</head>
<body>
<form action="../actions/actionnodoInviaRPT.php" method="post" autocomplete="off">
    <br>
    <fieldset>
        <legend>Parametri Request nodoInviaCarrelloRPT</legend>
        <br>
        <fieldset>
            <legend>Intestazione SOAP</legend>
            identificativoIntermediarioPA: <input type="text" name="identificativoIntermediarioPA" value="97735020584"><br>
            identificativoStazioneIntermediarioPA: <input type="text" name="identificativoStazioneIntermediarioPA" value="97735020584_01"><br>
        </fieldset>
        <br>
        <fieldset>
            <legend>SOAP Action</legend>
            password: <input type="text" name="password" value="TestECTE01"><br>
            identificativoPSP: <input type="text" name="identificativoPSP" value="AGID_01"><br>
            identificativoIntermediarioPSP: <input type="text" name="identificativoIntermediarioPSP" value="97735020584"><br>
            identificativoCanale: <input type="text" name="identificativoCanale" value="97735020584_02"><br>
            identificativoDominio: <input type="text" name="identificativoDominio" value="77777777777"><br>
            identificativoUnivocoVersamento: <input type="text" name="identificativoUnivocoVersamento" value="<?php echo$IUV?>"><br>
	        codiceContestoPagamento: <input type="text" name="codiceContestoPagamento" value="<?php echo$CCP?>"><br>
            tipoFirma: <input type="text" name="tipoFirma" value="0"><br>
            <br>
            <fieldset id="rpt">
                <legend>RPT</legend>
                versioneOggetto: <input type="text" name="versioneOggetto" value="6.2"><br>
                identificativoDominio: <input type="text" name="identificativoDominio" value="77777777777"><br>
		        identificativoMessaggioRichiesta: <input type="text" name="identificativoMessaggioRichiesta" value="<?php echo$IDM;?>"><br>
                dataOraMessaggioRichiesta: <input type="text" name="dataOraMessaggioRichiesta" value="<?php  echo date('c'); ?>"><br>
                autenticazioneSoggetto: <input type="text" name="autenticazioneSoggetto" value="N/A"><br>
                <br>
                <fieldset>
                    <legend>Dati Soggetto Pagatore</legend>
                    tipoIdentificativoUnivoco: <input type="text" name="tipoIdentificativoUnivocoP" value="F"><br>
                    codiceIdentificativoUnivoco: <input type="text" name="codiceIdentificativoUnivocoP" value="KSMKSH80A01H501D"><br>
                    anagraficaPagatore: <input type="text" name="anagraficaPagatore" value="Kenshiro Kasumi"><br>
                    indirizzoPagatore: <input type="text" name="indirizzoPagatore" value="Divina Scuola di Hokuto"><br>
                    civicoPagatore: <input type="text" name="civicoPagatore" value="100"><br>
                    capPagatore: <input type="text" name="capPagatore" value="00100"><br>
                    localitaPagatore: <input type="text" name="localitaPagatore" value="Croce del Sud"><br>
                    provinciaPagatore: <input type="text" name="provinciaPagatore" value="RM"><br>
                    nazionePagatore: <input type="text" name="nazionePagatore" value="IT"><br>
                    e-mailPagatore: <input type="text" name="e-mailPagatore" value="kenshiro.kasumi@divinascuolahokuto.it"><br>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Dati Ente Beneficiario</legend>
                    tipoIdentificativoUnivoco: <input type="text" name="tipoIdentificativoUnivocoB" value="G"><br>
                    codiceIdentificativoUnivoco: <input type="text" name="codiceIdentificativoUnivocoB" value="77777777777"><br>
                    denominazioneBeneficiario: <input type="text" name="denominazioneBeneficiario" value="Ente Intermediato di Test da AgID TEST"><br>
                    indirizzoBeneficiario: <input type="text" name="indirizzoBeneficiario" value="Viale Liszt"><br>
                    civicoBeneficiario: <input type="text" name="civicoBeneficiario" value="21"><br>
                    capBeneficiario: <input type="text" name="capBeneficiario" value="00100"><br>
                    localitaBeneficiario: <input type="text" name="localitaBeneficiario" value="Roma"><br>
                    provinciaBeneficiario: <input type="text" name="provinciaBeneficiario" value="RM"><br>
                    nazioneBeneficiario: <input type="text" name="nazioneBeneficiario" value="IT"><br>
                </fieldset>

                <br>
                <fieldset>
                    <legend>Dati Versamento</legend>
                    Specificare il numero di versamenti, (MAX 5): <input type="text" id="numeroVersamenti" name="numeroVersamenti" value="1"> <a href="#" id="applicaVersamenti" onclick="addFields()">Applica</a><br />
                    dataEsecuzionePagamento: <input type="text" name="dataEsecuzionePagamento" value="<?php echo date("Y-m-d"); ?>"><br>
                    importoTotaleDaVersare: <input id="importoTotaleDaVersare" type="text" name="importoTotaleDaVersare" value=""><br>
                    tipoVersamento: <input type="text" name="tipoVersamento" value="BBT"><br>
		            identificativoUnivocoVersamento: <input type="text" name="identificativoUnivocoVersamento" value="<?php echo $IUV?>"><br>
                    codiceContestoPagamento: <input type="text" name="codiceContestoPagamento" value="<?php echo$CCP?>"><br>
		    ibanAddebito:  <input type="text" name="ibanAddebito" value="IT06T1063911700000000010535"><br>
		    firmaRicevuta: <input type="text" name="firmaRicevuta" value="0"><br>
                    <!--BLOCCO Container dove iniettare i campi-->
                    <div id="container"/>
                </fieldset>
            </fieldset>
        </fieldset>
    </fieldset>
    <input type="submit" value="InviaRPT">
</form>

</body>
</html>
