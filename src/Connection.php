<?php

namespace FernleafSystems\ApiWrappers\Pushover;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Freeagent
 * @property string $user_key
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.pushover.net/%s';
	const API_VERSION = 1;

	/**
	 * @deprecated
	 * @return string
	 */
	public function getUserKey() {
		return $this->getStringParam( 'user_key' );
	}

	/**
	 * @param string $sKey
	 * @return $this
	 */
	public function setUserKey( $sKey ) {
		$this->user_key = $sKey;
		return $this;
	}
}