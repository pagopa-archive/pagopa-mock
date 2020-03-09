<?php
require_once("SendXMLToWebService.class.php");


$xml = <<<SOAPSTR
<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Body>
    <Add xmlns="http://tempuri.org/">
      <intA>5</intA>
      <intB>7</intB>
    </Add>
  </soap12:Body>
</soap12:Envelope>
SOAPSTR;
    $test = new SendXMLToWebService("http://www.dneonline.com/calculator.asmx");
    $resXML = $test->sendXML($xml);
    $dom = new DOMDocument;
    $dom->loadXML($resXML);
?>

<!DOCTYPE html>
<html>
<body>

    <!-- Include required JS files -->
    <script type="text/javascript" src="views/SyntaxHighlighter/shCore.js"></script>

    <!--
        At least one brush, here we choose JS. You need to include a brush for every
        language you want to highlight
    -->
    <script type="text/javascript" src="views/SyntaxHighlighter/shBrushXml.js"></script>

    <!-- Include *at least* the core style and default theme -->
    <link href="views/SyntaxHighlighter/shCore.css" rel="stylesheet" type="text/css" />
    <link href="views/SyntaxHighlighter/shThemeDefault.css" rel="stylesheet" type="text/css" />

    <!-- You also need to add some content to highlight, but that is covered elsewhere. -->

    <?php
    echo "<pre>";
    print_r("Risultato: ");
    echo($resXML);
    /*echo $IP->item(0)->nodeName." = ".$IP->item(0)->nodeValue."\n";
    echo $ReturnCodeDetails->item(0)->nodeName." = ".$ReturnCodeDetails->item(0)->nodeValue."\n";
    echo $CountryName->item(0)->nodeName." = ".$CountryName->item(0)->nodeValue."\n";
    echo $CountryCode->item(0)->nodeName." = ".$CountryCode->item(0)->nodeValue."\n";*/
    echo "</pre>";

    ?>

    <div>
        <pre class="brush: xml">
        <xml version="1.0" encoding="utf-8">

            <!-- comments -->
            <rootNode>
              <childNodes>
                  <childNode attribute = "value" namespace:attribute='value' attribute=/>
                  <childNode />
                  <childNode />
                  <childNode />
                  <childNode
                      attr1="value"
                      attr2="10"
                      attr3="hello"
                  >
                          value
                      </childNode>
                  <namespace:childNode>
                      <![CDATA[
                          this is some CDATA content
                      <!-- comments inside cdata -->
                          <b alert='false'>tags inside cdata</b>
                      ]]>

                      value = "plain string outside"
                      hello = world
                  </namespace:childNode>
              </childNodes>
            </rootNode>

            <!--
              -- Multiline comments <b>tag</b>
              -->
        </pre>
    </div>
    <!-- Finally, to actually run the highlighter, you need to include this JS on your page -->
    <script type="text/javascript">
        SyntaxHighlighter.all()
    </script>


</body>
</html>