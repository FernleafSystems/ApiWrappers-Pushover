<?php

namespace FernleafSystems\ApiWrappers\Pushover;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\FreeAgent
 */
class Api extends BaseApi {

	/**
	 * @return bool
	 */
	public function isLastRequestSuccess() {
		$bSuccess = parent::isLastRequestSuccess();
		if ( $bSuccess ) {
			$aResp = $this->getDecodedResponseBody();
			$bSuccess = is_array( $aResp ) && isset( $aResp[ 'status' ] ) && $aResp[ 'status' ] == 1;
		}
		return $bSuccess;
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
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

	/**
	 * Use this to override the User Key set in the Connection
	 * @param string $sKey
	 * @return $this
	 * @deprecated
	 */
	public function setUserKey( $sKey ) {
		return $this->setParam( 'user_key', $sKey );
	}
}