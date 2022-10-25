<?php

namespace FernleafSystems\ApiWrappers\Pushover;

/**
 * @property string $user_key
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.pushover.net/%s';
	const API_VERSION = 1;

	/**
	 * @return string
	 * @deprecated
	 */
	public function getUserKey() {
		return $this->user_key;
	}

	/**
	 * @param string $key
	 * @return $this
	 * @deprecated
	 */
	public function setUserKey( $key ) {
		$this->user_key = $key;
		return $this;
	}
}