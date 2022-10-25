<?php

namespace FernleafSystems\ApiWrappers\Pushover\User;

use FernleafSystems\ApiWrappers\Pushover\Api;

class Verify extends Api {

	public function verify() :bool {
		return $this->req()->isLastRequestSuccess();
	}

	/**
	 * @param string $device
	 * @return $this
	 */
	public function setDevice( $device ) {
		return $this->setRequestDataItem( 'device', $device );
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function setUserGroupKey( $key ) {
		return $this->setRequestDataItem( 'user', $key );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return 'users/validate.json';
	}
}