<?php

namespace Tests\Feature;

use Tests\TestCase;

class MigrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMigrateRollbackCommand(): void
    {
        $this->artisan('migrate')->assertSuccessful();
        $this->artisan('migrate:rollback')->assertSuccessful();
        $this->artisan('migrate')->assertSuccessful();
    }

    public function testMigrateRefreshCommand()
    {
        $this->artisan('migrate')->assertSuccessful();
        $this->artisan('migrate:refresh')->assertSuccessful();
    }
}
