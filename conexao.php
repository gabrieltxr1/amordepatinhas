<?php
define("HOST", "localhost");    // NOME DA MÁQUINA
define("USER", "root");         // NOME DE USUÁRIO
define("PASS", "");             // SENHA
define("BASE", "trabalho_ls");  // NOME DA BASE DE DADOS

$conn = new MySQLi(HOST, USER, PASS, BASE);
