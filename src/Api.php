<?php

namespace FernleafSystems\ApiWrappers\Pushover;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\FreeAgent
 */
class Api extends BaseApi {

	const REQUEST_METHOD = 'post';

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oConn */
		$oConn = $this->getConnection();
		return sprintf( '%s/%s', $oConn->getBaseUrl(), $oConn->getApiVersion() );
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$this->setRequestDataItem( 'token', $this->getConnection()->getApiKey() );
		return parent::prepFinalRequestData();
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
	public function setUserKey( $sKey ) {
		return $this->setRequestDataItem( 'user', $sKey );
	}
}