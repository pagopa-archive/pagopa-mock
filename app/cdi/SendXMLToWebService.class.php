<?php

/**
 * SendXMLToWebService
 * This class is for transmitting an http / POST request to Web service
 * through a XML document
 *
 * @license http://opensource.org/licenses/GPL-2.0 GNU Public License
 */

class SendXMLToWebService {

   	/**
	 * cURL option Connection time out
	 * @var int
	 */
	public $connecttimeout = 10;
   	/**
	 * cURL option Time out
	 * @var int
	 */	
	public $timeout = 10;
   	/**
	 * cURL option Return transfer
	 * @var boolean
	 */	
	public $returntransfer = true;
   	/**
	 * cURL option SSL Verify Peer
	 * @var boolean
	 */		
	public $ssl_verifypeer = false;
   	/**
	 * cURL option SSL Verify Host
	 * @var boolean
	 */		
	public $ssl_verifyhost = false;
   	/**
	 * cURL option Post
	 * @var boolean
	 */	
	public $post = true;
   	/**
	 * Header Charset
	 * @var string
	 */	
	public $charset = 'utf-8';
   	/**
	 * Header Content-type
	 * @var string
	 */	
	public $contentType = 'text/xml';
   	/**
	 * Enable MD5 encryption for password
	 * @var boolean
	 */	
	public $md5_pass = false;
   	/**
	 * Enable cURL debug
	 * @var boolean
	 */	
	public $debug = true;
   	/**
	 * Set url (private)
	 * @var string
	 */	
	private $_url;
   	/**
	 * Set username (private)
	 * @var string
	 */	
	private $_user = '';
   	/**
	 * Set password (private)
	 * @var string
	 */	
	private $_pass = '';
   	/**
	 * Extra headers (private)
	 * @var array
	 */	
	private $_extraHeaders = array();

	/**
	 * @param string $url url to connect to Web service
	 */
	public function __construct($url) {
		$this->_url = $url;
		$this->_checkRequisites();
	}
	/**
	 * Send XML document to Web Service
	 * @param string $post_string string containing XML document
	 * @return string result string, usually in XML format
	 */
	public function sendXML($post_string) {
		$psLen = strlen($post_string);
		$headers = $this->_getHeaders($psLen);				

		$soap_do = curl_init(); 
		curl_setopt($soap_do, CURLOPT_URL,            $this->_url);   
		curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, $this->connecttimeout); 
		curl_setopt($soap_do, CURLOPT_TIMEOUT,        $this->timeout); 
		curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, $this->returntransfer);
		curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);  
		curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, $this->ssl_verifyhost); 
		curl_setopt($soap_do, CURLOPT_POST,           $this->post); 
		curl_setopt($soap_do, CURLOPT_POSTFIELDS,    $post_string); 
		curl_setopt($soap_do, CURLOPT_HTTPHEADER,    $headers);
		if (!empty($this->_user)) {
			curl_setopt($soap_do, CURLOPT_USERPWD, $this->_user.":".$this->_pass);		
		}
		$result = curl_exec($soap_do);
		$err = curl_error($soap_do);
		curl_close ($soap_do);
		if ($err && $this->debug) 
			echo "ERROR: <pre>".$err."</pre>";
		return $result;

	}
	/**
	 * Set username and password
	 * @param string $user username
	 * @param string $pass password
	 */
	public function setCredentials($user, $pass) {
		$this->_user = $user;
		$this->_pass = md5($pass);
		if ($this->md5_pass) {
			$this->_pass = md5($this->_pass);
		}
	}
	/**
	 * Set an additional header
	 * @param string $extraHeader a valid header row
	 */
	public function setExtraHeader($extraHeader) {
		array_push($this->_extraHeaders,$extraHeader);
	}
	/**
	 * Set multiple additional header at once in array format
	 * @param array $extraHeaders an array with multiple header rows
	 */
	public function setExtraHeaders($extraHeaders) {
		$this->_extraHeaders = array_merge($this->_extraHeaders,$extraHeaders);
	}
	/**
	 * Remove all additional headers
	 */
	public function resetExtraHeaders() {
		$this->_extraHeaders = array();
	}
	/**
	 * Prints out all additional headers
	 */
	public function printExtraHeaders() {
		print_r($this->_extraHeaders);
	}
	/**
	 * Compose headers
	 * @param string $psLen length of the XML string 
	 */
	private function _getHeaders($psLen) {
		$headers = array();
		array_push($headers,'Content-Type: '.$this->contentType.'; charset='.$this->charset);
		if (count($this->_extraHeaders) > 0) {
			$headers = array_merge($headers,$this->_extraHeaders);
		}
		array_push($headers,'Content-Length: '.$psLen);
		return $headers;		
	}
	/**
	 * Check if cURL and allow_url_fopen are enabled, check url validity
	 */	
	private function _checkRequisites() {
		if (!function_exists('curl_version'))
			die("cURL is not enabled!");
		if(!ini_get('allow_url_fopen'))
			die("allow_url_fopen is not enabled!");
		if (!filter_var($this->_url, FILTER_VALIDATE_URL)) 
			die("URL is not valid!");
		return true;
	}

}
?>
