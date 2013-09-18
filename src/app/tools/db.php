<?php

require_once DIR . '/vendor/MongoRecord/BaseMongoRecord.php';

class Db
{
	private static $status = true;

	public static function connect($name, $url = null)
	{
		try {
			BaseMongoRecord::$connection = new Mongo($url);
			BaseMongoRecord::$database = $name;
		} catch (MongoConnectionException $e) {
			static::$status = false;
			throw new DbConnectionException($e);
		}
	}

	public static function getStatus()
	{
		return static::$status;
	}
}

class DbConnectionException extends Exception
{
	function __construct(Exception $e)
	{
		parent::__construct($e);
	}
}