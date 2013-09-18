<?php

require_once DIR . '/app/models/Model.php';

class Topic extends Model
{
	protected static $attributesToSave = array('title', 'content');

	public function toJsonObject()
	{
		$jsonObject = array(
			'title' => $this->getTitle(),
			'content' => $this->getContent()
		);
		if (isset($this->attributes['_id'])) {
			$jsonObject['_id'] = (string)$this->getID();
		}
		return $jsonObject;
	}

}