<?php

header('Content-type: application/wsdl+xml');
echo file_get_contents('schema.wsdl');
