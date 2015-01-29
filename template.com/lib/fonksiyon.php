<?php

require dirname(__FILE__) . '/ayar.php';

require dirname(__FILE__) . '/fonksiyon2.php';

$saintx_saintx_charset = array(
    'saintx_charset' => 'utf8',
    'collation' => 'utf8_general_ci'
);

$db->sorgu('SET NAMES ' . $saintx_charset['saintx_charset'] . ' COLLATE ' . $saintx_charset['collation']);
$db->sorgu('SET character_set_client = ' . $saintx_charset['saintx_charset']);
$db->sorgu('SET character_set_results = ' . $saintx_charset['saintx_charset']);
$db->sorgu('SET character_set_connection = ' . $saintx_charset['saintx_charset']);
$db->sorgu('SET collation_connection = ' . $saintx_charset['collation']);