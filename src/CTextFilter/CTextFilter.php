<?php
//Instantiate the markdown class.
use \Michelf\MarkdownExtra;
/**
 *  CTextFiler - Filtering the content for CContent.
 *	Helps CContent to clean and filtering the contents.
 */
class CTextFilter {

	private $filters = array();
	
	/**
    * Constructor 
    *
	*/
	public function __construct($filterarray = array()) {
		//echo "Filter called!";
		$this->filters = $filterarray;	
	}
	
	
	/**
	* Call each filter.
	*
	* @param string $filters as comma separated list of filter.
	* @return string the formatted text.
	*/
	public function doFilter($text, $useFilters) {
		
		if(isset($useFilters) && $useFilters){
			$filter = preg_replace('/\s/', '', explode(',', $useFilters));	
			foreach($filter as $val) {
				$text = $this->filters[$val]($text);
			}
		}
		
	  return $text;
	}
	
	// Returns a html list of active filters.
	public function getFiltersList(){
		$html = "<h5>This is available filters to use</h5><ul>";
			
		foreach($this->filters as $val) {
			$html .= "<li>".$this->filters[$val]."</li>";
		}
		return $html .= "</ul>";
	}

	/**
	* Helper, nl2br creates newline breakes.
	*
	* @param string text The text to be converted.
	* @return string the formatted text.
	*/
	private function get_nl2br($text) {
		return nl2br($text);
	}
	
	/**
	* Helper, BBCode formatting converting to HTML.
	*
	* @link http://dbwebb.se/coachen/reguljara-uttryck-i-php-ger-bbcode-formattering
	* @param string text The text to be converted.
	* @return string the formatted text.
	*/
	private function bbcode2html($text) {
	  $search = array( 
		'/\[b\](.*?)\[\/b\]/is', 
		'/\[i\](.*?)\[\/i\]/is', 
		'/\[u\](.*?)\[\/u\]/is', 
		'/\[img\](https?.*?)\[\/img\]/is', 
		'/\[url\](https?.*?)\[\/url\]/is', 
		'/\[url=(https?.*?)\](.*?)\[\/url\]/is' 
		);   
	  $replace = array( 
		'<strong>$1</strong>', 
		'<em>$1</em>', 
		'<u>$1</u>', 
		'<img src="$1" />', 
		'<a href="$1">$1</a>', 
		'<a href="$1">$2</a>' 
		);     
	  return preg_replace($search, $replace, $text);
	}


	/**
	 * Make clickable links from URLs in text.
	 *
	 * @link http://dbwebb.se/coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar
	 * @param string $text the text that should be formatted.
	 * @return string with formatted anchors.
	 */
	private function make_clickable($text) {
	  return preg_replace_callback(
		'#\b(?<![href|src]=[\'"])https?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
		create_function(
		  '$matches',
		  'return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";'
		),
		$text
	  );
	}

	
	/**
	 * Format text according to Markdown syntax.
	 *
	 * @link http://dbwebb.se/coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php
	 * @param string $text the text that should be formatted.
	 * @return string as the formatted html-text.
	 */
	private function markdown($text) {
		require_once('Markdown.php');
		require_once('MarkdownExtra.php');

		return MarkdownExtra::defaultTransform($text);
	}
}