<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseClickstream extends Doctrine_Record
{
  public function setTableDefinition()
  {
    $this->setTableName('clickstream');
    $this->hasColumn('clickstream_id', 'integer', 4, array('type' => 'integer', 'unsigned' => '1', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
    $this->hasColumn('userid', 'integer', 4, array('type' => 'integer', 'unsigned' => '1', 'length' => '4'));
    $this->hasColumn('created', 'timestamp', 25, array('type' => 'timestamp', 'length' => '25'));
    $this->hasColumn('script_uri', 'string', 2147483647, array('type' => 'string', 'length' => '2147483647'));
    $this->hasColumn('query_string', 'string', 2147483647, array('type' => 'string', 'length' => '2147483647'));
    $this->hasColumn('ip', 'string', 15, array('type' => 'string', 'length' => '15'));
    $this->hasColumn('extra_data', 'string', 2147483647, array('type' => 'string', 'length' => '2147483647'));
  }

}