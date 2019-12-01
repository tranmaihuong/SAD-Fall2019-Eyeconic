<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	protected $tableName;
	protected $keyField;

	public function __construct(string $tableName, string $keyField = 'Id')
	{
		parent::__construct();

		$this->load->helper('QueryStringBuilder');

		$this->tableName = $tableName;
		$this->keyField = $keyField;
	}

	public function insert(array $keyValuePairs)
	{
		if (is_array($keyValuePairs[0])) return $this->insertMany($keyValuePairs);

		$sql = "INSERT INTO `$this->tableName` ";
		$sql .= qsb_buildKeyStringForInsertQuery($keyValuePairs);
		$sql .= " VALUES ";
		$sql .= qsb_buildValueStringForInsertQuery($keyValuePairs);

		$this->db->query($sql);

		return array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}

	public function insertMany(array $rows)
	{
		$sql = "INSERT INTO `$this->tableName` ";
		$sql .= qsb_buildKeyStringForInsertQuery($rows[0]);
		$sql .= " VALUES ";
		$valueStringArr = array();
		foreach ($rows as $row) {
			array_push($valueStringArr, qsb_buildValueStringForInsertQuery($row));
		}
		$sql .= implode(', ', $valueStringArr);

		$this->db->query($sql);

		return array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}

	public function select(array $fields = array())
	{
		$fieldsList = qsb_buildFieldsList($fields);
		$sql = "SELECT $fieldsList
				FROM $this->tableName";

		return $this->db->query($sql)->result();
	}

	public function selectOne($key, array $fields = array())
	{
		$fieldsList = qsb_buildFieldsList($fields);
		$sql = "SELECT $fieldsList
				FROM $this->tableName
				WHERE `$this->keyField` = '$key'";

		return $this->db->query($sql)->row();
	}

	public function update($key, array $keyValuePairs)
	{
		$sql = "UPDATE $this->tableName SET ";
		$sql .= implode(', ', array_map(
			function ($value, $key) {
				return "$key = '$value'";
			},
			$keyValuePairs,
			array_keys($keyValuePairs)
		));
		$sql .= " WHERE `$this->keyField` = '$key'";

		$this->db->query($sql);

		return array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}

	public function delete($key)
	{
		$sql = "DELETE FROM $this->tableName WHERE $this->keyField = $key";

		$this->db->query($sql);

		return array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}
}
