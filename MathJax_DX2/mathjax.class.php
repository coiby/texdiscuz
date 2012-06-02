<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
 * Discuz plugin for MathJax
 * use $$ or \[\] to wrap texcodes
 * @copyright	© 2010 ZJUSTU
 * @author		Coiby@zjustu [http://zjustu.org]
 * @since		version - 2012-6-2
 */
class plugin_mathjax {
	var $pluginurl = '';
	public function __construct() {
		global $_G;

		$this->pluginurl = $_G['siteurl'].'source/plugin/mathjax/';
	}
	function global_footer(){
		$script = "<script type='text/x-mathjax-config'>\n
  MathJax.Hub.Config({\n
    tex2jax: {\n
      inlineMath: [ ['$','$'], [\"\\\\[\",\"\\\\]\"] ],\n
      processEscapes: true\n
    }\n
  });\n
</script>";
		$script .= "<script type='text/javascript' src='/MathJax/MathJax.js?config=TeX-AMS_HTML-full'></script>\n";
		
		return $script;
	}
}

?>
