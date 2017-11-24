<?php

namespace FernleafSystems\ApiWrappers\Pushover\User;

use FernleafSystems\ApiWrappers\Pushover\Api;

/**
 * Class Verify
 * @package FernleafSystems\ApiWrappers\Pushover\User
 */
class Verify extends Api {

	/**
	 * @return bool
	 */
	public function verify() {
		$aResponse = $this->send()
						  ->getDecodedResponseBody();
		return isset( $aResponse[ 'status' ] ) && $aResponse[ 'status' ] == 1;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'users/validate.json';
	}
}