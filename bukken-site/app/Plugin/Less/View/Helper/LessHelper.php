<?php
/**
 * Less CSS Plugin
 * 
 * Less Helper for compiling and minifying the outputted CSS and creating a
 * HTML link tag for css files.
 * 
 * PHP Version 5.2
 * 
 * @author Ben Auld <ben@benauld.com>
 * @copyright Copyright (c) 2012, Ben Auld. All rights reserved.
 * @package Less
 * @subpackage View.Helper
 */
App::import('Vendor', 'Less.LessPhp', array('file' => 'less.php.inc'));
App::import('Vendor', 'Less.CssMin', array('file' => 'cssmin-v3.0.1.php'));

class LessHelper extends AppHelper
{
	/**
	 * Helpers
	 * 
	 * @var array
	 * @access public
	 */
	public $helpers = array(
		'Html'
	);
	
	/**
	 * Compiles and minifies supplied LESS files and returns HTML link tags. If
	 * Core debug is higher than 0, the cache is refreshed on each request,
	 * otherwise the cache is returned.
	 * 
	 * Available options
	 * - minify (default: true)
	 *   If true, the compiled CSS will be minified
	 * 
	 * - combine (default: true)
	 *   If true, the css files will be combined into one
	 * 
	 * - output_directory (default: ccss/)
	 *   Specifies where the the compiled CSS should live. This is a directory
	 *   within the webroot without the / at the beginning.
	 * 
	 * @param mixed $path
	 * @param array $options
	 * @return string
	 * @access public
	 * @todo When debug is 0, don't recompile
	 */
	public function link($path, $options = array())
	{
		$defaults = array(
			'minify' => true,
			'combine' => true,
			'output_directory' => 'ccss/'
		);
		
	//	$options = array_merge($options, $defaults);
		$options = array_merge($defaults, $options);
		
		$debug = Configure::read('debug');
		
		if (is_string($path)) {
			$files = array($path);
		} else {
			$files = $path;
		}
		
		$data = array();
		
		foreach ($files as $k => $file) {
			if (strpos($file, '://') == false && substr($file, 0, 1) !== '/') {
				$files[$k] = '/css/' . $file;
			}
			
			if (strpos($files[$k], '://') == false) {
				$path = WWW_ROOT . substr($files[$k], 1);
			} else {
				$path = $files[$k];
			}

			$data[$path] = file_get_contents($path);
		}
		
		foreach ($data as $k => $css) {
			$css = $this->__compileLess($css);
			
			if ($options['minify']) {
				$css = $this->__minifyCss($css);
			}
			
			$data[$k] = $css;
		}
		
		if ($options['combine']) {
			$combined = '';
			$path = '';
			
			foreach ($data as $k => $css) {
				$combined .= $css;
				$path .= $k;
			}
			
			$data = array($path => $combined);
		}
		
		$paths = array();
		
		foreach ($data as $k => $css) {
			$filename = md5($k) . '.css';
			file_put_contents(WWW_ROOT . $options['output_directory'] . $filename, $css);
			$paths[] = '/' . $options['output_directory'] . $filename;
		}
		
		return $this->Html->css($paths);
	}
	
	/**
	 * Invokes the LessPHP class and returns the compiled input
	 * 
	 * @param string $input
	 * @return string
	 * @access private
	 */
	private function __compileLess($input)
	{
		$less = new lessc();
		return $less->parse($input);
	}
	
	/**
	 * Minifies given CSS
	 * 
	 * @param string $input
	 * @return string
	 * @access public
	 */
	private function __minifyCss($input)
	{
		return CssMin::minify($input);
	}
}
