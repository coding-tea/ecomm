<?php

use Opium\EcommerceWebsite\db;
use PHPUnit\Framework\TestCase;

class dbTest extends TestCase
{
  public function testGetDB()
  {
    $this->expectException(Exception::class);
    db::getDB();
  }

  public function testExecQuery()
  {
    $this->expectException(Exception::class);
    db::ExecQuery('select * from card', []);
  }
}
