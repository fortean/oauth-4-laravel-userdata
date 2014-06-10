# Laravel 4 wrapper for UserData extension library to PHPoAuthLib

oauth-4-laravel-userdata is a simple Laravel 4 service provider (wrapper) for [Oryzone/PHPoAuthUserData](https://github.com/Oryzone/PHPoAuthUserData).
PHPoAuthUserData is an extension library for [Lusitanian/PHPoAuthLib](https://github.com/Lusitanian/PHPoAuthLib) which provides oAuth support in PHP 5.3+
and is very easy to integrate with any project which requires an oAuth client.

### Contents
 
- [Installation](#installation)
- [Usage](#usage)
- [Providers support](#providers-support)
- [License](#license)

## Installation

Add oauth-4-laravel-userdata to your composer.json file:

```
"require": {
  "fortean/oauth-4-laravel-userdata": "dev-master"
}
```

Use composer to install this package.

```
$ composer update
```

### Registering the Package

Register the service provider within the ```providers``` array found in ```app/config/app.php```:

```php
'providers' => array(
	// ...
	
	'Fortean\OAuthUserData\OAuthUserDataServiceProvider'
)
```

Add an alias within the ```aliases``` array found in ```app/config/app.php```:


```php
'aliases' => array(
	// ...
	
	'OAuthUserData' => 'Fortean\OAuthUserData\Facade\OAuthUserData',
)
```

## Usage

Just follow the steps below and you will be able to use a [service class object](https://github.com/Lusitanian/PHPoAuthLib/tree/master/src/OAuth/OAuth2/Service)
to obtain a user data extractor customized for the oAuth provider it services:

```php
$facebook = Oauth::consumer('Facebook')
$extractor = OAuthUserData::service($facebook);
echo $extractor->getUniqueId(); // prints out the unique id of the user
echo $extractor->getUsername(); // prints out the username of the user
echo $extractor->getImageUrl(); // prints out the url of the user profile image
```

## Providers support

Currently there are extractors for the following providers:

- Facebook
- GitHub
- Instagram
- Linkedin
- Twitter

See [Oryzone/PHPoAuthUserData](https://github.com/Oryzone/PHPoAuthUserData) for details on how to add/modify provider-specific extractors.

## License

This library is licensed under the [MIT license](LICENSE).