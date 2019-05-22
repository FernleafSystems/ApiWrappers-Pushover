# ApiWrappers-Pushover
PHP Wrapper for Pushover Notifications API

## Installation

To get started, add the package to your project by issuing the following command:

    composer require fernleafsystems/apiwrappers-pushover

Current version 0.1.x is beta. Please include using strict Composer versions.

## Getting Started

Only 2 main parts of the API are implemented so far:

1. User/Group Verification
2. Message sending (`Push`ing)

### 1) User / Group Verification

With all API requests, the first thing to do is create a new API Connection.

**Verify a user or a group**
```php
	use FernleafSystems\ApiWrappers\Pushover;
	
	$oConnection = ( new Pushover\Connection() )
			->setApiKey( 'your api key' );
			
	$bSuccess = ( new Pushover\User\Verify() )
		->setConnection( $oConn )
		->setUserGroupKey( 'user or group key' )
		->verify();
```

### 2) User / Group Verification with changed Key

To perform actions against the API you send an Access Token - not the OAuth code you
obtained in the previous stage. To get this, your app will send a request for a new
token and it will look like this:

### 3) Send a message

```php
	use FernleafSystems\ApiWrappers\Pushover;

	$bSuccess = ( new Pushover\Message\Push() )
		->setConnection( $oConn )
		->setUserGroupKey( 'user or group key' )
		->setTitle( 'My lovely title' )
		->setMessage( 'An important message' )
		->setIsHtml( false )
		->push();	
```

Sending a message is very simple. Give the title and the message and adjust any
other parameters of the Message according to the API.

### 4) Send to a specific device.

```php
	$bSuccess = ( new Pushover\Message\Push() )
		->setDevice( 'Device Key' )
		...
		->push();	
```

All the current API classes let you specify an optional device. If this is omitted
it uses all devices.

In the case of Verify, if it's omitted it verifies the user has at least 1 active device.

## Errors and Exceptions

When retrieving, creating and updating, there are some basic checks on the data to ensure
the absolute minimums are provided before a request is sent out. If these checks fail
an `Exception` is thrown.

If these checks don't fail, and the request fails, you have a few options. This will likely
change in the future as the current implementation is flawed and not satisfactory.

If you find bugs, suggestions for improvements etc., please do let us know.