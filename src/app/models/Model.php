<?php

require_once DIR . '/vendor/MongoRecord/BaseMongoRecord.php';

abstract class Model extends BaseMongoRecord
{
	private $validationErrors = array();

	public function addError($key, $message)
	{
		$this->validationErrors[$key][] = $message;
	}

	public function hasErrors()
	{
		return sizeof($this->validationErrors) > 0;
	}

	public function getErrors()
	{
		return $this->validationErrors;
	}

	public function getErrorsAsString()
	{
		$errors = array();
		foreach ($this->validationErrors as $field => $messages) {
			$errors[] = join(', ', $messages);
		}
		return join("\n", $errors);
	}

	public function toJson()
	{
		return json_encode($this->toJsonObject());
	}

	public abstract function toJsonObject();

	/**
	 * @param $id String
	 * @return Model
	 */
	public static function findById($id)
	{
		return static::findOne(array('_id' => new MongoId($id)));
	}


}