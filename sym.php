<?php
 $target = '/opt/1panel/apps/openresty/openresty/www/sites/staging.omni-united.com/index/core/writable/public';
 $shortcut = 'storage';
 symlink($target, $shortcut);
//$target = 'C:\xampp\htdocs\omni-code\writable\public';
//$shortcut = 'storage';
//symlink($target, $shortcut);
?>