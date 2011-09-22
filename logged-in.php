<?php
/*
Plugin Name: Logged in
Plugin URI: http://dessibelle.se/
Description: A plugin that allows you to close the entire site to non-logged in users.
Author: Simon Fransson
Plugin URI: http://dessibelle.se/
Version: 1.0b1
*/


class LoggedIn
{
	const FILTER_DOMAIN = 'logged_in';
	
	protected static $instance;
	protected $callback;
	protected $message;
	
	protected function __construct()
	{
		$this->initialize();
	}

	public static function instance()
	{
		if (!isset(self::$instance)) {
			$className = __CLASS__;
			self::$instance = new $className;
		}
		return self::$instance;
	}

	protected function initialize()
	{
		$this->message = '<h1>' . __('This site is currently not available. Please come back later.', 'logged_in') . '</h1>';
		add_action('init', array(&$this, 'validateRequest'));
	}
	
	protected function filterName($name) {
		return sprintf("%s_%s", self::FILTER_DOMAIN, $name);
	}
	
	public function validateRequest()
	{
		if (!$this->urlIsValid()) {	
			$cb = apply_filters($this->filterName('cb'), $this->callback());
			if ($cb) {
				call_user_func($cb);
			}
		}
	}
	
	protected function callback()
	{
		$action = apply_filters($this->filterName('action'), 'login');
		$method = null;
		
		switch ($action) {
			case 'fallback':
				$method = 'gotoThemeFallback';
				break;
			case 'message':
				$method = 'displayMessage';
				break;
			default:
				$method = 'gotoLogin';
				break;
		}
		
		return array(&$this, $method);
	}
	
	protected function urlIsValid($request_url = null)
	{
		if (!$request_url) {
			$request_url = sprintf('http%s://%s%s', (empty($_SERVER['HTTPS']) ? '' : 's'), $_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI']);
		}
		$login_url = wp_login_url();
		
		return !(!is_admin() && !is_user_logged_in() && strpos($request_url, $login_url) === false);
	}
	
	public function gotoLogin()
	{
		$status = apply_filters($this->filterName('redirect_status'), 302);
		
		wp_redirect( wp_login_url( site_url() ), $status );
		$this->kill();
	}
	
	public function gotoThemeFallback()
	{
		$path = apply_filters($this->filterName('fallback_path'), STYLESHEETPATH . '/' . apply_filters($this->filterName('fallback_filename'), 'fallback.php'));
		
		include_once($path);
		
		$this->kill();
	}
	
	protected function displayMessage() {
		
		$this->message = apply_filters($this->filterName('message'), $this->message);
		
		get_header();
		
		echo $this->message;
		
		get_footer();
		
		$this->kill();
	}
	
	protected function kill($m = null)
	{
		die($m);
	}
}

$li = LoggedIn::instance();