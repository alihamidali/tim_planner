<?php

namespace App\Entity;

use Symfony\Component\ExpressionLanguage\ExpressionFunction;

class Cuisines
{
    const AMERICAN_CUISINE = 'American Cuisine';
    const BRITISH_CUISINE = 'British Cuisine';
    const CARIBBEAN_CUISINE = 'Caribbean Cuisine';
    const CHINESE_CUISINE = 'Chinese Cuisine';
    const FRENCH_CUISINE = 'French Cuisine';
    const GREEK_CUISINE = 'Greek Cuisine';
    const INDIAN_CUISINE = 'Indian Cuisine';
    const ITALIAN_CUISINE = 'Italian Cuisine';
    const JAPANESE_CUISINE = 'Japanese Cuisine';
    const MEDITERRANEAN_CUISINE = 'Mediterranean Cuisine';
    const MEXICAN_CUISINE = 'Mexican Cuisine';
    const OROCCAN_CUISINE = 'oroccan Cuisine';
    const SPANISH_CUISINE = 'Spanish Cuisine';
    const THAI_CUISINE = 'Thai Cuisine';
    const VIETNAMES_CUISINE = 'Vietnames Cuisine';
    const TURKISH_CUISINE = 'Turkish Cuisine';

    const ALL_CUISINES = [
        self::AMERICAN_CUISINE      => self::AMERICAN_CUISINE,
        self::BRITISH_CUISINE       => self::BRITISH_CUISINE,
        self::CARIBBEAN_CUISINE     => self::CARIBBEAN_CUISINE,
        self::CHINESE_CUISINE       => self::CHINESE_CUISINE,
        self::FRENCH_CUISINE        => self::FRENCH_CUISINE,
        self::GREEK_CUISINE         => self::GREEK_CUISINE,
        self::INDIAN_CUISINE        => self::INDIAN_CUISINE,
        self::ITALIAN_CUISINE       => self::ITALIAN_CUISINE,
        self::JAPANESE_CUISINE      => self::JAPANESE_CUISINE,
        self::MEDITERRANEAN_CUISINE => self::MEDITERRANEAN_CUISINE,
        self::MEXICAN_CUISINE       => self::MEXICAN_CUISINE,
        self::OROCCAN_CUISINE       => self::OROCCAN_CUISINE,
        self::SPANISH_CUISINE       => self::SPANISH_CUISINE,
        self::THAI_CUISINE          => self::THAI_CUISINE,
        self::VIETNAMES_CUISINE     => self::VIETNAMES_CUISINE,
        self::TURKISH_CUISINE       => self::TURKISH_CUISINE,
    ];
}