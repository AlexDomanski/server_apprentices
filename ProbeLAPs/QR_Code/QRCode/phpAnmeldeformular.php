<!DOCTYPE html>
<html lang="de">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
<title>PHP DEMO</title>
<style>
     form {
      padding-top: 3em;
      position: relative;
      padding-top: 0px;
      }
      input {
      background-color: #fffbf0; 
      border: 1px solid #e7c157;  
      }
      label::after {
      content: ": ";
      }
      .btnRed {
         opacity: 0.5;
         background-color: #f44336;} 
      
      /* Red */
      input:required{
      border: 2px solid orange;
      }
      input:valid {
      border: 1px solid black;
      }


    .selector-for-some-widget {
  box-sizing: content-box;
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    function generateBarCode(ergebnis) {
        var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + ergebnis + '&amp;size=50x50';
        $('#barcode').attr('src', url);
        document.getElementById("txtErgebnis").innerHTML = ergebnis;
        return false;
    }
</script>

<script>
    function fname() {

        let ergebnis = "Falsch";
        let form1 = document.getElementById("form1");
        var svnr = document.getElementsByName("txtSvnr")[0].value;
        //let svnr = form1.txtVorname;
        if (svnr) {
            let firstCharacter = svnr[0];

            if (firstCharacter != '0') {

                let sec = svnr[1];
                let third = svnr[2];
                let pruef = svnr[3];
                let gebT1 = svnr[4];
                let gebT2 = svnr[5];
                let gebM1 = svnr[6];
                let gebM2 = svnr[7];
                let gebJ1 = svnr[8];
                let gebJ2 = svnr[9];


                let pruefCalc = firstCharacter * 3 + sec * 7 + third * 9 + gebT1 * 5 + gebT2 * 8 + gebM1 * 4 + gebM2 * 2 + gebJ1 * 1 + gebJ2 * 6;
                pruefCalc = pruefCalc % 11;
                if ((pruefCalc != 10) && (pruefCalc == pruef)) {
                    ergebnis = "Richtig";
                }
            }
        }
        return generateBarCode(ergebnis);
    }
</script>





<body >
    <form id="form1" onclick="return fname()" method="POST" class="container g-3">
        <h1> QR-Code mit Versicherungsnummercheck </h1>
        <h2>Konto</h2>
        <fieldset>
            <p class="row">
                <label for="anrede" class="col">Anrede</label>
                <select name="anrede" id="anrede" class="col">
                    <option value="Herr" selected="selected">Herr</option>
                    <option value="Frau">Frau</option>
                </select>
               </p>
               </fieldset>
            <p class="row"">
                <label for="txtVorname"  class="col">Vorname</label>
                <input id="txtVorname" name="txtVorname" type="text" class="col" autofocus placeholder="Vorname">
            </p>
            <p class="row">
                <label for="txtNachname" class="col">Nachname</label>
                <input id="txtNachname" name="txtNachname" type="text" class="col" placeholder="Nachname">
            </p>
            <p class="row">
                <label for="txtSvnr" class="col">SV-Nr.</label>
                <input id="txtSvnr" name="txtSvnr" aria-required="true" type="text" placeholder="SV-Nr." pattern="[0-9]{10}" class="col" required>
            </p>
            <p>
                <input id="btnSubmit" class="btn btn-primary rounded mx-auto d-block" type="submit">Erstellen</input>
            </p>
            <p>
                <button class="button btnRed rounded mx-auto d-block" type="reset"> Leere das Formular</button>
            </p>
    </form>
    <p class="container">
      <br>
      <label id="txtErgebnis"></label>   
    <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" alt="" title="HELLO" width="100" height="100" class="rounded mx-auto d-block" />

</p>
</body>

</html>