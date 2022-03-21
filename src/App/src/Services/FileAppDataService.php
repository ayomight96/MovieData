<?php
namespace App\Services;

class FileAppDataService
{
public function __invoke()
{
return include __DIR__ . '/../../../../data/MovieData.php';
}
}