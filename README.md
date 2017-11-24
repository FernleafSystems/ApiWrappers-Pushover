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
	$oConnection = ( new \FernleafSystems\ApiWrappers\Pushover\Connection() )
    		->setApiKey( 'your api key' )
    		->setUserKey( 'user or group key' );
    		
	$bSuccess = ( new \FernleafSystems\ApiWrappers\Pushover\User\Verify() )
    	->setConnection( $oConn )
    	->verify();
```

Note that the user or group you are verifying here is based on the user key
that you provided when you created the `$oConnection`.

This can be overridden per API request without disturbing the `$oConnection`.

### 2) User / Group Verification with changed Key

To perform actions against the API you send an Access Token - not the OAuth code you
obtained in the previous stage. To get this, your app will send a request for a new
token and it will look like this:

```php
	$oConnection = ( new \FernleafSystems\ApiWrappers\Pushover\Connection() )
    		->setApiKey( 'your api key' )
    		->setUserKey( 'user or group key' );
    		
	$bSuccess = ( new \FernleafSystems\ApiWrappers\Pushover\User\Verify() )
    	->setConnection( $oConn )
    	->setUserKey( 'change your user key here if you need to' )
    	->verify();
```

Again, setting the user key later on on the API object doesn't change the User/Group key
that is stored in the `$oConnection`. The key within the `$oConnection` is the fallback.

### 3) Send a message

```php
	$bSuccess = ( new \FernleafSystems\ApiWrappers\Pushover\Message\Push() )
    	->setConnection( $oConn )
    	->setTitle( 'My lovely title' )
    	->setMessage( 'An important message' )
    	->setIsHtml( false )
    	->push();	
```

Sending a message is very simple. Give the title and the message and adjust any
other parameters of the Message according to the API.

### 4) Send to a specific device.

```php
	$bSuccess = ( new \FernleafSystems\ApiWrappers\Pushover\Message\Push() )
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