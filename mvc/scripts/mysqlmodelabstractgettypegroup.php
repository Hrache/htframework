<?php
if (in_array($type, MySQLDataType::NUMERIC)) return MySQLDataType::NUMERIC_GRP;
elseif (in_array($type, MySQLDataType::TEXT)) return MySQLDataType::TEXT_GRP;
elseif (in_array($type, MySQLDataType::BINARY)) return MySQLDataType::BINARY_GRP;
elseif (in_array($type, MySQLDataType::BLOB)) return MySQLDataType::BLOB_GRP;
elseif (in_array($type, MySQLDataType::SPATIAL)) return MySQLDataType::SPATIAL_GRP;
elseif (in_array($type, MySQLDataType::CHAR)) return MySQLDataType::CHAR_GRP;
elseif (in_array($type, MySQLDataType::DATETIME)) return MySQLDataType::DATETIME_GRP;

return 0;
?>