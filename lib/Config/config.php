<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  define("BASE_URL", "http://localhost/husky");
} else {
  define("BASE_URL", "");
}
