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
		return $this->send()
					->isLastRequestSuccess();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'users/validate.json';
	}
}