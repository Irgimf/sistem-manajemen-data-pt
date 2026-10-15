<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
require FCPATH . '../app/Config/Paths.php';
$paths = new Config\Paths();
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

$db = \Config\Database::connect();
$db->query('UPDATE sbu SET company_id = (SELECT id FROM companies WHERE companies.user_id = sbu.user_id LIMIT 1) WHERE company_id IS NULL');
echo "Updated.";
