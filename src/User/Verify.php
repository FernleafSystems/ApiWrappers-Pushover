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
		return $this->req()->isLastRequestSuccess();
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setDevice( $sValue ) {
		return $this->setRequestDataItem( 'device', $sValue );
	}

	/**
	 * @param string $sKey
	 * @return $this
	 */
	public function setUserGroupKey( $sKey ) {
		return $this->setRequestDataItem( 'user', $sKey );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'users/validate.json';
	}
}