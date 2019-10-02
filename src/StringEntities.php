<?php
/**
 * Convert strings into htmlentities and hex entities
 *
 * @author Ian <ian@ianh.io>
 * @since 02/10/2019
 */

namespace Icawebdesign\StringEntities;

class StringEntities
{
    public static function email(string $address): string
    {
        // Check if the address has an '@' char
        // If not, return string as-is
        if (false === strpos($address, '@')) {
            return $address;
        }

        list ($account, $domain) = explode('@', $address);

        return sprintf(
            '%s%%40%s', self::htmlhex($account), self::htmlentities($domain)
        );
    }

    public static function htmlentities(string $string): string
    {
        $entityString = [];
        $stringLength = strlen($string);

        for ($i = 0; $i < $stringLength; ++$i) {
            $entityString[] = sprintf('&#x%s;', bin2hex($string[$i]));
        }

        return implode('', $entityString);
    }

    public static function htmlhex(string $string): string
    {
        $entityString = [];
        $stringLength = strlen($string);

        for ($i = 0; $i < $stringLength; ++$i) {
            $entityString[] = sprintf('%%%s', bin2hex($string[$i]));
        }

        return implode('', $entityString);
    }
}
