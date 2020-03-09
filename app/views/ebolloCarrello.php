<?php
$IUV="RF".rand(100000000,1000000000);
$CCP=rand(7000,7000000);
$IDCARRELLO="AGID".rand(900,90000);
$IDM="AGID".rand(10,100)."IDM";
$IMPORTO="16";
$DEC="00";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pagoPA MOC</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<form action="../actions/actionebolloCarrello.php" method="post" autocomplete="off">
    <fieldset>
        <legend>Parametri Request EBOLLO su nodoInviaCarrelloRPT</legend>
        <fieldset>
            <legend>Intestazione SOAP</legend>
            identificativoIntermediarioPA: <input type="text" name="identificativoIntermediarioPA" value="97735020584"><br>
            identificativoStazioneIntermediarioPA: <input type="text" name="identificativoStazioneIntermediarioPA" value="97735020584_01"><br>
	    identificativoCarrello: <input type="text" name="identificativoCarrello" value="<?php echo$IDCARRELLO?>"><br>
        </fieldset>
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
            Numero di RPT: <select name="numeroRPT" id="numeroRPT">
                <option selected="selected">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <fieldset id="rpt">
                <legend>RPT</legend>
                versioneOggetto: <input type="text" name="versioneOggetto" value="6.2"><br>
                identificativoDominio: <input type="text" name="identificativoDominio" value="77777777777"><br>
		identificativoMessaggioRichiesta: <input type="text" name="identificativoMessaggioRichiesta" value="<?php echo$IDM;?>"><br>
                dataOraMessaggioRichiesta: <input type="text" name="dataOraMessaggioRichiesta" value="<?php  echo date('c'); ?>"><br>
                autenticazioneSoggetto: <input type="text" name="autenticazioneSoggetto" value="N/A"><br>
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
                    nazionePagatore: <input type="text" name="nazionePagatore" value="RM"><br>
                    e-mailPagatore: <input type="text" name="e-mailPagatore" value="kenshiro.kasumi@divinascuolahokuto.it"><br>
                </fieldset>
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
                <fieldset>
                    <legend>Dati Versamento</legend>
                    dataEsecuzionePagamento: <input type="text" name="dataEsecuzionePagamento" value="<?php echo date("Y-m-d"); ?>"><br>
		    importoTotaleDaVersare: <input type="text" name="importoTotaleDaVersare" value="<?php echo "$IMPORTO.$DEC"?>"><br>
                    tipoVersamento: <input type="text" name="tipoVersamento" value="BBT"><br>
		    identificativoUnivocoVersamento: <input type="text" name="identificativoUnivocoVersamento" value="<?php echo $IUV?>"><br>
                    codiceContestoPagamento: <input type="text" name="codiceContestoPagamento" value="<?php echo$CCP?>"><br>
		    ibanAddebito:  <input type="text" name="ibanAddebito" value="IT60X0542811101000000123456"><br>
		    firmaRicevuta: <input type="text" name="firmaRicevuta" value="0"><br>
                    Numero di Versamenti: <select name="numeroDatiSingoloVersamento" id="numeroDatiSingoloVersamento">
                        <option selected="selected">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <fieldset>
                        <legend>Dati Singolo Versamento</legend>
			importoSingoloVersamento: <input type="text" name="importoSingoloVersamento" value="<?php echo"$IMPORTO.$DEC"?>"><br>
                        ibanAppoggio: <input type="text" name="ibanAppoggio" value="IT57N0760114800000011050036"><br>
                        credenzialiPagatore: <input type="text" name="credenzialiPagatore" value="n/a"><br>
			causaleVersamento: <input type="text" name="causaleVersamento" value="<?php echo "/RFS/$IUV/$IMPORTO.$DEC"; ?>"><br>
			datiSpecificiRiscossione: <input type="text" name="datiSpecificiRiscossione" value="9/abcdefg"><br>
			tipoBollo: <input type="text" name="tipoBollo" value="01"><br>
			hashDocumento: <input type="text" name="hashDocumento" value="bdh3vCzgL/vutKuoE3SUlgQyWQou71GBFu5DcNXceOA="><br>
			provinciaResidenza: <input type="text" name="provinciaResidenza" value="RM"><br>
                    </fieldset>
                </fieldset>
            </fieldset>
        </fieldset>
    </fieldset>
    <input type="submit" value="Invia Carrello">
</form>

</body>
</html>
