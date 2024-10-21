<?php

namespace App\Enum;

class LanguageEnum
{
    public const Bangla = 1;
    public const English = 2;
    public const Hindi = 3;
    public const French = 4;
    public const German = 5;
    public const Italian = 6;
    public const Spanish = 7;
    public const Arabic = 8;
    public const Portuguese = 9;
    public const Turkish = 10;
    public const Chinese = 11;
    public const Japanese = 12;
    public const Korean = 13;
    public const Russian = 14;
    public const Polish = 15;
    public const Hebrew = 16;
    public const Vietnamese = 17;
    public const Indonesian = 18;
    public const Thai = 19;

    public static function getLanguages()
    {
        return [
            self::Bangla => 'Bangla',
            self::English => 'English',
            self::Hindi => 'Hindi',
            self::French => 'French',
            self::German => 'German',
            self::Italian => 'Italian',
            self::Spanish => 'Spanish',
            self::Arabic => 'Arabic',
            self::Portuguese => 'Portuguese',
            self::Turkish => 'Turkish',
            self::Chinese => 'Chinese',
            self::Japanese => 'Japanese',
            self::Korean => 'Korean',
            self::Russian => 'Russian',
            self::Polish => 'Polish',
            self::Hebrew => 'Hebrew',
            self::Vietnamese => 'Vietnamese',
            self::Indonesian => 'Indonesian',
            self::Thai => 'Thai',
        ];
    }
}