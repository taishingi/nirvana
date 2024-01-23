<?php

define("ROOT", dirname(__DIR__));
define("CONFIG", sprintf("%s%s%s", ROOT, DIRECTORY_SEPARATOR, "config"));
define("APP", sprintf("%s%s%s", ROOT, DIRECTORY_SEPARATOR, "app"));
define("CONTROLLERS", sprintf("%s%sControllers", APP, DIRECTORY_SEPARATOR));
define("MODELS", sprintf("%s%sModels", APP, DIRECTORY_SEPARATOR));
define("VIEWS", sprintf("%s%sViews", APP, DIRECTORY_SEPARATOR));
