<?php

namespace FernleafSystems\ApiWrappers\Pushover;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Freeagent
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	use StdClassAdapter;

	const Url_Base = 'https://api.pushover.net/';
	const API_Version_Default = 1;

	/**
	 * @return string
	 */
	public function getApiVersion() {
		$sValue = $this->getParam( 'api_version' );
		return is_null( $sValue ) ? self::API_Version_Default : $sValue;
	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		$sValue = $this->getStringParam( 'url_base' );
		$sValue = empty( $sValue ) ? self::Url_Base : $sValue;
		return rtrim( $sValue, '/' );
	}
}