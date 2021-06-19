<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . "/../src/App/App.php";

return ConsoleRunner::createHelperSet($entityManager);
