<?php

session_start();

session_unset(); #Eliminar datos de sesión

session_destroy();# Cerramos la sesión

header('Location: php.login');