<?php
/**
 * Discuz plugin for MathJax
 * use $$ or \[\] to wrap texcodes
 * @copyright	© 2012 ZJUSTU
 * @author		Coiby@ZJUSTU <http://zjustu.org>
 * @since		version - 2012-6-3
 * @version      1.0
 * @License GPL3
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

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
		if(CURMODULE == 'viewthread' || CURMODULE == 'forumdisplay' || CURMODULE == 'post' ) {
		$script = "<script type='text/x-mathjax-config'>\n MathJax.Hub.Config({\n    tex2jax: {
      inlineMath: [ ['$','$'], [\"\\\\[\",\"\\\\]\"], ['[tex]','[/tex]'] ],\n processEscapes: true\n}\n });\n </script>";
		$script .= "<script type='text/javascript' src='".$this->mathjax_api."'></script>\n";
		return $script;
		} else{
			return;
		}
	}
	function post_editorctrl_left(){
		$str = $css = '';
		$str = '<a id="ed_mathjax" href="plugin.php?id=mathjax:mathjax&adds=e_iframe"  menupos="00" menuwidth="600" class="b1r" title="'.lang('plugin/mathjax','Input_Math').'"  onclick="showWindow(\'mathjax_add\', this.href);" style="background:url(source/plugin/mathjax/images/LaTex.png) no-repeat;">'.lang('plugin/mathjax','Formula').'</a>';
		return $str.$css;
	}
}

class plugin_mathjax_forum extends plugin_mathjax {
}
?>
