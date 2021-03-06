<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseExpenses extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('expenses');
        $this->hasColumn('expense_id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('expense', 'string', 255, array('type' => 'string', 'length' => '255'));
        $this->hasColumn('amount', 'decimal', 10, array('type' => 'decimal', 'length' => '10'));
        $this->hasColumn('date', 'timestamp', 25, array('type' => 'timestamp', 'length' => '25'));
    }
}
