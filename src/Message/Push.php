<?php

namespace FernleafSystems\ApiWrappers\Pushover\Message;

use FernleafSystems\ApiWrappers\Pushover;

class Push extends Pushover\Api {

	public function push() :bool {
		return $this->req()->isLastRequestSuccess();
	}

	/**
	 * https://pushover.net/api#priority
	 * @param string $url - used in conjunction with Emergency (Priority 2)
	 * @return $this
	 */
	public function setCallbackUrl( $url ) {
		return $this->setRequestDataItem( 'callback', $url );
	}

	/**
	 * @param string $device
	 * @return $this
	 */
	public function setDevice( $device ) {
		return $this->setRequestDataItem( 'device', $device );
	}

	/**
	 * @param string $seconds
	 * @return $this
	 */
	public function setExpire( $seconds ) {
		return $this->setRequestDataItem( 'expire', $seconds );
	}

	/**
	 * @param bool $isHtml
	 * @return $this
	 */
	public function setIsHtml( $isHtml = false ) {
		return $isHtml ? $this->setRequestDataItem( 'html', 1 ) : $this->removeRequestDataItem( 'html' );
	}

	/**
	 * @param string $msg
	 * @return $this
	 */
	public function setMessage( $msg ) {
		return $this->setRequestDataItem( 'message', $msg );
	}

	/**
	 * https://pushover.net/api#priority
	 * @param int $priority -2 ~ +2
	 * @return $this
	 */
	public function setPriority( $priority = 0 ) {
		return $this->setRequestDataItem( 'priority', min( 2, max( -2, (int)$priority ) ) );
	}

	/**
	 * @param string $seconds - minimum 30s; used in conjunction with Priority 2.
	 * @return $this
	 */
	public function setRetry( $seconds ) {
		return $this->setRequestDataItem( 'retry', min( 30, $seconds ) );
	}

	/**
	 * Possible values: https://pushover.net/api#sounds
	 * @param string $sound
	 * @return $this
	 */
	public function setSound( $sound ) {
		return $this->setRequestDataItem( 'sound', $sound );
	}

	/**
	 * @param int $ts
	 * @return $this
	 */
	public function setTime( $ts ) {
		return $this->setRequestDataItem( 'timestamp', $ts );
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setTitle( $title ) {
		return $this->setRequestDataItem( 'title', $title );
	}

	/**
	 * @param string $url
	 * @return $this
	 */
	public function setUrl( $url ) {
		return $this->setRequestDataItem( 'url', $url );
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setUrlTitle( $title ) {
		return $this->setRequestDataItem( 'url_title', $title );
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function setUserGroupKey( $key ) {
		return $this->setRequestDataItem( 'user', $key );
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

	protected function getUrlEndpoint() :string {
		return 'messages.json';
	}
}