<?php
try {
    $db = new PDO('sqlite:' . __DIR__ . '/../writable/inkindo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('UPDATE sbu SET company_id = (SELECT id FROM companies WHERE companies.user_id = sbu.user_id LIMIT 1) WHERE company_id IS NULL');
    echo "Success\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
