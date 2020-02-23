<?php
libxml_use_internal_errors(true);

class DOMValidator
{
    /**
     * @var string
     */
    protected $feedSchema = "";
    /**
     * @var int
     */
    public $feedErrors = 0;
    /**
     * Formatted libxml Error details
     *
     * @var array
     */
    public $errorDetails;
    /**
     * Validation Class constructor Instantiating DOMDocument
     *
     * @param XSD $xsdFile
     * @param \DOMDocument $handler [description]
     */
    public function __construct($xsdFile)
    {
        $this->handler = new \DOMDocument('1.0', 'utf-8');
        $this->feedSchema = $xsdFile;
    }
    /**
     * @param \libXMLError object $error
     *
     * @return string
     */
    private function libxmlDisplayError($error)
    {
       /* $errorString = "Error $error->code in $error->file (Line:{$error->line}):";
        $errorString .= trim($error->message);
        return $errorString;*/

        $errorString="<br/>";

        switch ($error->level) {
            case LIBXML_ERR_WARNING:
                $errorString .= "<b>Warning</b> $error->code: ";
                break;
            case LIBXML_ERR_ERROR:
                $errorString .= "<b>Error</b> $error->code: ";
                break;
            case LIBXML_ERR_FATAL:
                $errorString .= "<b>Fatal Error</b> $error->code: ";
                break;
        }
        $errorString .= trim($error->message) .
            "<br/>  Line: $error->line" .
            "<br/>  Column: $error->column <br/>";

        return $errorString;
    }
    /**
     * @return array
     */
    private function libxmlDisplayErrors()
    {
        $errors = libxml_get_errors();
        $result    = [];
        foreach ($errors as $error) {
            $result[] = $this->libxmlDisplayError($error);
        }
        libxml_clear_errors();
        return $result;
    }
    /**
     * Validate Incoming Feeds against Listing Schema
     *
     * @param resource $feeds
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function validateFeeds($feeds)
    {
        if (!class_exists('DOMDocument')) {
            throw new \DOMException("'DOMDocument' classe non trovata!");
            return false;
        }
        if (!file_exists($this->feedSchema)) {
            throw new \Exception('Lo Schema XSD non è stato trovato.');
            return false;
        }
        libxml_use_internal_errors(true);
        if (!($fp = fopen($feeds, "r"))) {
            die("could not open XML input");
        }

        $contents = fread($fp, filesize($feeds));
        fclose($fp);

        $this->handler->loadXML($contents, LIBXML_NOBLANKS);
        if (!$this->handler->schemaValidate($this->feedSchema)) {
            $this->errorDetails = $this->libxmlDisplayErrors();
            $this->feedErrors   = 1;
        } else {
            //The file is valid
            return true;
        }
    }
    /**
     * Display Error if Resource is not validated
     *
     * @return array
     */
    public function displayErrors()
    {
        return $this->errorDetails;
    }

    public function validateStrings($xmlContent)
    {
        if (!class_exists('DOMDocument')) {
            throw new \DOMException("'DOMDocument' classe non trovata!");
            return false;
        }
        if (!file_exists($this->feedSchema)) {
            throw new \Exception('Lo Schema XSD non è stato trovato.');
            return false;
        }
        libxml_use_internal_errors(true);

        $this->handler->loadXML($xmlContent, LIBXML_NOBLANKS);
        if (!$this->handler->schemaValidate($this->feedSchema)) {
            $this->errorDetails = $this->libxmlDisplayErrors();
            $this->feedErrors   = 1;
        } else {
            //The file is valid
            return true;
        }
    }

}
