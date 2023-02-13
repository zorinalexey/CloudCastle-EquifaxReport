<?php

namespace CloudCastle\EquifaxReport\Bin;

class PostInstall
{
    public static function init()
    {
        $command = 'dir=' . __DIR__ . DIRECTORY_SEPARATOR . 'uidgen_src' . PHP_EOL;
        $command .= 'cd $dir' . PHP_EOL;
        $command .= 'make' . PHP_EOL;
        $command .= 'cd ../' . PHP_EOL;
        $command .= 'cp $dir/uidgen $(pwd)/uidgen' . PHP_EOL;
        $command .= 'rm $(pwd)/uidgen_src/uidgen' . PHP_EOL;
        $command .= 'rm $(pwd)/uidgen_src/*.o' . PHP_EOL;
        $command .= 'chmod 777 $(pwd)/uidgen' . PHP_EOL;
        exec($command, $out, $code);
        return !$code;
    }
}