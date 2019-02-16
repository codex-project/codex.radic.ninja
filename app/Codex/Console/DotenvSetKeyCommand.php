<?php namespace App\Codex\Console;

class DotenvSetKeyCommand extends \Jackiedo\DotenvEditor\Console\Commands\DotenvSetKeyCommand
{
    protected function stringToType($string)
    {
        if ($string === 'true' || $string === 'false') {
            return $string;
        }
        return parent::stringToType($string);
    }

}
