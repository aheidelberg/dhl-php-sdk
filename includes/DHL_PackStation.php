<?php
/**
 * Author: Peter Dragicevic [peter-91@hotmail.de]
 * Authors-Website: http://petschko.org/
 * Date: 17.03.2017
 * Time: 12:09
 * Update: -
 * Version: 1.0.0
 *
 * Notes: Contains the DHL_PackStation class
 */

/**
 * Class DHL_PackStation
 */
class DHL_PackStation {
	/**
	 * Contains the Post-Number
	 *
	 * Note: Optional
	 * Min-Len: 1
	 * Max-Len: 10
	 *
	 * @var string|null $postNumber - Post-Number
	 */
	private $postNumber = null;

	/**
	 * Contains the Pack-Station-Number
	 *
	 * Min-Len: 3
	 * Max-Len: 3
	 *
	 * @var string $packStationNumber - Pack-Station-Number
	 */
	private $packStationNumber = '';

	/**
	 * Contains the ZIP-Code
	 *
	 * Min-Len: -
	 * Max-Len: 10
	 *
	 * @var string $zip - ZIP-Code
	 */
	private $zip = '';

	/**
	 * Contains the City/Location
	 *
	 * Min-Len: -
	 * Max-Len: 35
	 *
	 * @var string $location - Location
	 */
	private $location = '';

	/**
	 * Contains the Country
	 *
	 * Note: Optional
	 * Min-Len: -
	 * Max-Len: 30
	 *
	 * @var string|null $country - Country
	 */
	private $country = null;

	/**
	 * Contains the country ISO-Code
	 *
	 * Note: Optional
	 * Min-Len: 2
	 * Max-Len: 2
	 *
	 * @var string|null $countryISOCode - Country-ISO-Code
	 */
	private $countryISOCode = null;

	/**
	 * Contains the Name of the State
	 *
	 * Note: Optional
	 * Min-Len: -
	 * Max-Len: 30
	 *
	 * @var string|null $state - Name of the State
	 */
	private $state = null;

	/**
	 * Clears Memory
	 */
	public function __destruct() {
		unset($this->postNumber);
		unset($this->packStationNumber);
		unset($this->zip);
		unset($this->location);
		unset($this->country);
		unset($this->countryISOCode);
		unset($this->state);
	}

	/**
	 * @return null|string
	 */
	public function getPostNumber() {
		return $this->postNumber;
	}

	/**
	 * @param null|string $postNumber
	 */
	public function setPostNumber($postNumber) {
		$this->postNumber = $postNumber;
	}

	/**
	 * @return string
	 */
	public function getPackStationNumber() {
		return $this->packStationNumber;
	}

	/**
	 * @param string $packStationNumber
	 */
	public function setPackStationNumber($packStationNumber) {
		$this->packStationNumber = $packStationNumber;
	}

	/**
	 * @return string
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * @param string $zip
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * @return string
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * @return string
	 */
	public function getCity() {
		return $this->location;
	}

	/**
	 * @param string $location
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * @param string $city
	 */
	public function setCity($city) {
		$this->location = $city;
	}

	/**
	 * @return null|string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @param null|string $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @return null|string
	 */
	public function getCountryISOCode() {
		return $this->countryISOCode;
	}

	/**
	 * @param null|string $countryISOCode
	 */
	public function setCountryISOCode($countryISOCode) {
		$this->countryISOCode = $countryISOCode;
	}

	/**
	 * @return null|string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @param null|string $state
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * Returns a Class for the DHL-SendPerson
	 *
	 * @return StdClass - DHL-SendPerson-class
	 */
	public function getClass_v1() {
		// TODO: Implement getClass_v1() method.

		return new StdClass;
	}

	/**
	 * Returns a Class for the DHL-SendPerson
	 *
	 * @return StdClass - DHL-SendPerson-class
	 */
	public function getClass_v2() {
		$class = new StdClass;

		if($this->getPostNumber() !== null)
			$class->postNumber = $this->getPostNumber();
		$class->packstationNumber = $this->getPackStationNumber();
		$class->zip = $this->getZip();
		$class->city = $this->getLocation();

		if($this->getCountryISOCode() !== null) {
			$class->Origin = new StdClass;

			if($this->getCountry() !== null)
				$class->Origin->country = $this->getCountry();

			$class->Origin->countryISOCode = $this->getCountryISOCode();

			if($this->getState() !== null)
				$class->Origin->state = $this->getState();
		}

		return $class;
	}
}