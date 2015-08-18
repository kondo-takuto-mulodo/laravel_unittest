<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    protected static $databaseSetUp = false;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function setUpDatabase()
    {
        if(static::$databaseSetUp) return;

        Artisan::call('migrate');
        static::$databaseSetUp = true;
    }

    public function setUp()
    {
        parent::setUp();

        $this->createApplication();
        $this->setUpDatabase();
    }
}
