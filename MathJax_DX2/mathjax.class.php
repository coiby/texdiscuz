<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
 * Discuz plugin for MathJax
 * use $$ or \[\] to wrap texcodes
 * @copyright	© 2012 ZJUSTU
 * @author		Coiby@zjustu [http://zjustu.org]
 * @since		version - 2012-6-2
 * @License GPL2
 */
class plugin_mathjax {
	var $pluginurl = '';
	var $mathjax_api = '';
	public function __construct() {
		global $_G;
		if( ($this->mathjax_api=$_G['cache']['plugin']['mathjax']['mathjax_api'])==''){
			$this->mathjax_api = 'http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML';
		}
		$this->pluginurl = $_G['siteurl'].'source/plugin/mathjax/';
	}
	function global_footer(){
		if(CURMODULE == 'viewthread' || CURMODULE == 'forumdisplay' || CURMODULE == 'post' || CURMODULE == 'space') {
		$script = "<script type='text/x-mathjax-config'>\n MathJax.Hub.Config({\n    tex2jax: {
      inlineMath: [ ['$','$'], [\"\\\\[\",\"\\\\]\"], ['[tex]','[/tex]'] ],\n processEscapes: true\n}\n });\n </script>";
		$script .= "<script type='text/javascript' src='".$this->mathjax_api."'></script>\n";
		return $script;
		} else{
			return;
		}
	}
}

?>
