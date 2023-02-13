<?php

namespace CloudCastle\EquifaxReport\Bin;

class PostInstall
{
    public static function init()
    {
        $shellScript = __DIR__.DIRECTORY_SEPARATOR.'postInstallCmd.sh';
        exec("chmod 777 ".$shellScript);
        exec($shellScript, $out, $code);
        return !$code;
    }
}