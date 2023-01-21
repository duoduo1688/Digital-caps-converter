function china_cny($ns) {
    static $cnums = array("零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖"),
    $cnyunits = array("圆", "角", "分","厘","毫"),
    $grees = array("拾", "佰", "仟", "万", "拾", "佰", "仟", "亿");
    list($ns1, $ns2) = explode(".", $ns, 4);
    $ns2 = array_filter(array($ns2[3],$ns2[2],$ns2[1], $ns2[0]));
    //$ns2 = array_filter(array($ns2[1], $ns2[0]));
    $ret = array_merge($ns2, array(implode("", _cny_map_unit(str_split($ns1), $grees)), ""));
    $ret = implode("", array_reverse(_cny_map_unit($ret, $cnyunits)));
	$ret = str_replace(array_keys($cnums), $cnums, $ret);
	$ret = str_replace('零零','零', $ret);
    return $ret;
}
