<?php

class Lja_Db_Table extends Zend_Db_Table {

	public function findById($id) {
		$db = &$this->getAdapter();
		$where = $db->quoteInto('`id`=?', $id);

		return $this->fetchRow($where, null);
	}

	public function findByIds(array $ids) {
		$db = &$this->getAdapter();
		$where = $db->quoteInto('`id` IN (?)', $ids);

		return $this->fetchAll($where, null);
	}

	public function doDelete($id) {
		$db = &$this->getAdapter();
		$where = $db->quoteInto('id=?', $id);

		return $this->delete($where);
	}
}