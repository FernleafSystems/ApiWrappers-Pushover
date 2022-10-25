<?php

namespace FernleafSystems\ApiWrappers\Pushover;

use FernleafSystems\ApiWrappers\Base\BaseApi;

class Api extends BaseApi {

	public function isLastRequestSuccess() :bool {
		$success = parent::isLastRequestSuccess();
		if ( $success ) {
			$resp = $this->getDecodedResponseBody();
			$success = isset( $resp[ 'status' ] ) && $resp[ 'status' ] == 1;
		}
		return $success;
	}

	protected function prepFinalRequestData():array {
		$this->setRequestDataItem( 'token', $this->getConnection()->api_key );
		return parent::prepFinalRequestData();
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( strlen( $this->getUrlEndpoint() ) == 0 ) {
			throw new \Exception( 'Request Endpoint has not been provided' );
		}
		if ( !$this->getConnection()->hasApiKey() ) {
			throw new \Exception( 'API Key has not been provided in the Connection' );
		}
	}
}