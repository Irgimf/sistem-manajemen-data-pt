<?php
$db = new SQLite3(__DIR__ . '/../writable/database.db');
$db->exec('UPDATE sbu SET company_id = (SELECT id FROM companies WHERE companies.user_id = sbu.user_id LIMIT 1) WHERE company_id IS NULL');
echo "Done.";
