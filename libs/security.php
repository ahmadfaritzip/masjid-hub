<?php
/**
 * Fungsi-fungsi keamanan
 */
function escape_string($str){
    return stripslashes(strip_tags(htmlentities(htmlspecialchars($str, ENT_QUOTES))));
}
