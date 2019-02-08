<?php
    /*
        纯真数据库自动更新原理实现
        www.shuax.com 2014.03.27

        Modified by SukkaW
    */
    $copywrite = file_get_contents("./public/copywrite.rar");
    $qqwry = file_get_contents("./public/qqwry.rar");
    $key = unpack("V6", $copywrite)[6];
    for($i=0; $i<0x200; $i++)
    {
        $key *= 0x805;
        $key ++;
        $key = $key & 0xFF;
        $qqwry[$i] = chr( ord($qqwry[$i]) ^ $key );
    }
    $qqwry = gzuncompress($qqwry);
    $fp = fopen("./public/QQWry.Dat", "wb");
    if($fp)
    {
        fwrite($fp, $qqwry);
        fclose($fp);
        echo "Finish!";
    }
?>