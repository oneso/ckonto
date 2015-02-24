<?php
namespace Oneso\Ckonto\Webservice\Search;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class Search
{
	/**
	 * @var string
	 */
	protected $zip;

	/**
	 * @var string
	 */
	protected $bankCode;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $location;

	/**
	 * @var integer
	 */
	protected $max;

	/**
	 * @param $bankCode
	 * @param $location
	 * @param $name
	 * @param $zip
	 * @param null $max
	 */
	function __construct($bankCode = null, $location = null, $name = null, $zip = null, $max = null)
	{
		$this->bankCode = $bankCode;
		$this->location = $location;
		$this->name = $name;
		$this->zip = $zip;
		$this->max = $max;
	}

	/**
	 * @param string $bankCode
	 * @return $this
	 */
	public function setBankCode($bankCode)
	{
		$this->bankCode = $bankCode;
		return $this;
	}

	/**
	 * @param string $location
	 * @return $this
	 */
	public function setLocation($location)
	{
		$this->location = $location;
		return $this;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $zip
	 * @return $this
	 */
	public function setZip($zip)
	{
		$this->zip = $zip;
		return $this;
	}

	/**
	 * @param int $max
	 * @return $this
	 */
	public function setMax($max)
	{
		$this->max = $max;
		return $this;
	}

	/**
	 * @return SearchResponse
	 */
	public function search()
	{
		return SearchRequest::request($this->bankCode, $this->location, $this->name, $this->zip, $this->max);
	}
} 