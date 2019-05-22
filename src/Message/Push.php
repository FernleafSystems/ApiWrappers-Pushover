<?php

namespace FernleafSystems\ApiWrappers\Pushover\Message;

use FernleafSystems\ApiWrappers\Pushover;

/**
 * Class Push
 * @package FernleafSystems\ApiWrappers\Pushover\Message
 */
class Push extends Pushover\Api {

	/**
	 * @return bool
	 */
	public function push() {
		return $this->req()->isLastRequestSuccess();
	}

	/**
	 * https://pushover.net/api#priority
	 * @param string $sUrl - used in conjunction with Emergency (Priority 2)
	 * @return $this
	 */
	public function setCallbackUrl( $sUrl ) {
		return $this->setRequestDataItem( 'callback', $sUrl );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setDevice( $sValue ) {
		return $this->setRequestDataItem( 'device', $sValue );
	}

	/**
	 * @param string $nSeconds
	 * @return $this
	 */
	public function setExpire( $nSeconds ) {
		return $this->setRequestDataItem( 'expire', $nSeconds );
	}

	/**
	 * @param bool $bIsHtml
	 * @return $this
	 */
	public function setIsHtml( $bIsHtml = false ) {
		return $bIsHtml ? $this->setRequestDataItem( 'html', 1 ) : $this->removeRequestDataItem( 'html' );
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
		return $this->setRequestDataItem( 'priority', min( 2, max( -2, (int)$nPriority ) ) );
	}

	/**
	 * @param string $nSeconds - minimum 30s; used in conjunction with Priority 2.
	 * @return $this
	 */
	public function setRetry( $nSeconds ) {
		return $this->setRequestDataItem( 'retry', min( 30, $nSeconds ) );
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
	public function setTitle( $sValue ) {
		return $this->setRequestDataItem( 'title', $sValue );
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
	 * @param string $sKey
	 * @return $this
	 */
	public function setUserGroupKey( $sKey ) {
		return $this->setRequestDataItem( 'user', $sKey );
	}

	/**
	 * This is temporary stop-gap to make up for the previous poor design where a Connection could override the user key
	 * @throws \Exception
	 * @deprecated
	 */
	protected function preFlight() {
		if ( strlen( $this->getRequestDataItem( 'user' ) ) == 0 ) {
			/** @var Pushover\Connection $oConn */
			$oConn = $this->getConnection();
			$this->setRequestDataItem( 'user', $oConn->user_key );
		}
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'messages.json';
	}
}