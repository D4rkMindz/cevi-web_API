<?php


namespace App\Util;

/**
 * Class TranslateService
 */
class TranslateService
{
    /**
     * Translate string into german, english, french and italian.
     * @param string $string
     * @param string $lang
     * @return array
     */
    public static function trans(string $string, string $lang): array
    {
        $lang = strtolower(substr($lang, 0,2));
        $translated = [];
        switch ($lang) {
            case 'de':
                $translated['de'] = $string;
                $translated['en'] = self::toEnglish($string);
                $translated['fr'] = self::toFrench($string);
                $translated['it'] = self::toItalian($string);
                break;
            case 'en':
                $translated['de'] = self::toGerman($string);
                $translated['en'] = $string;
                $translated['fr'] = self::toFrench($string);
                $translated['it'] = self::toItalian($string);
                break;
            case 'fr':
                $translated['de'] = self::toGerman($string);
                $translated['en'] = self::toEnglish($string);
                $translated['fr'] = $string;
                $translated['it'] = self::toItalian($string);
                break;
            case'it':
                $translated['de'] = self::toGerman($string);
                $translated['en'] = self::toEnglish($string);
                $translated['fr'] = self::toFrench($string);
                $translated['it'] = $string;
                break;
            default:
                $translated = [
                    'de'=> $string,
                    'en'=> $string,
                    'fr'=> $string,
                    'it'=> $string,
                ];
                break;
        }
        return $translated;
    }

    /**
     * Translate string to german
     * @param string $string
     * @return string
     */
    private static function toGerman(string $string): string
    {
        return $string;
    }

    /**
     * Translate string to english
     * @param string $string
     * @return string
     */
    private static function toEnglish(string $string): string
    {
        return $string;
    }

    /**
     * Translate string to french
     * @param string $string
     * @return string
     */
    private static function toFrench(string $string): string
    {
        return $string;
    }

    /**
     * Translate string to italian
     * @param string $string
     * @return string
     */
    private static function toItalian(string $string): string
    {
        return $string;
    }
}
