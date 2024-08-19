<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Routing extends BaseConfig
{
    public $defaultNamespace = 'App\Controllers';
    public $defaultController = 'Home';
    public $defaultMethod = 'index';
    public $translateURIDashes = false;
    public $autoRoute = true;
    public ?string $override404 = null;
}