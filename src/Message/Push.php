<?php

namespace FernleafSystems\ApiWrappers\Pushover\Message;

use FernleafSystems\ApiWrappers\Pushover\Api;

/**
 * Class Push
 * @package FernleafSystems\ApiWrappers\Pushover\Message
 */
class Push extends Api {

	/**
	 * @return bool
	 */
	public function push() {
		$aResponse = $this->send()
						  ->getDecodedResponseBody();
		return isset( $aResponse[ 'status' ] ) && $aResponse[ 'status' ] == 1;
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setMessage( $sValue ) {
		return $this->setRequestDataItem( 'message', $sValue );
	}

	/**
	 * https://pushover.net/api#priority
	 * @param int $nPriority -2 ~ +2
	 * @return $this
	 */
	public function setPriority( $nPriority = 0 ) {
		return $this->setRequestDataItem( 'priority', $nPriority );
	}

	/**
	 * Possible values: https://pushover.net/api#sounds
	 * @param string $sValue
	 * @return $this
	 */
	public function setSound( $sValue ) {
		return $this->setRequestDataItem( 'sound', $sValue );
	}

	/**
	 * @param int $nTimestamp
	 * @return $this
	 */
	public function setTime( $nTimestamp ) {
		return $this->setRequestDataItem( 'timestamp', $nTimestamp );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setUrl( $sValue ) {
		return $this->setRequestDataItem( 'url', $sValue );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setUrlTitle( $sValue ) {
		return $this->setRequestDataItem( 'url_title', $sValue );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setTitle( $sValue ) {
		return $this->setRequestDataItem( 'title', $sValue );
	}

	/**
	 * @param bool $bIsHtml
	 * @return $this
	 */
	public function setIsHtml( $bIsHtml = false ) {
		return $bIsHtml ? $this->setRequestDataItem( 'html', 1 ) : $this->removeRequestDataItem( 'html' );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'messages.json';
	}
}