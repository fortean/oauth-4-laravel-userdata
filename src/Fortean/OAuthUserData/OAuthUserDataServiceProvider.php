<?php namespace Fortean\OAuthUserData;

/**
 * @author     Bruce Walter <walter@fortean.com>
 * @copyright  Copyright (c) 2014
 * @license    http://www.opensource.org/licenses/mit-license.html MIT License
 */

use Illuminate\Support\ServiceProvider;

class OAuthUserDataServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('fortean/oauth-4-laravel-userdata');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	    // Register 'oauth-userdata'
		$this->app['oauth-userdata'] = $this->app->share(function($app)
		{
			// Create OAuthUserData instance
			$oauthUserData = new OAuthUserData();

			// Return OAuthUserData instance
			return $oauthUserData;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
