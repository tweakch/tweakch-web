<?php

namespace App\i18n;

/**
 * Language management class for multilingual support
 * Handles loading translations and providing translation functions
 */
class Language 
{
    private static $instance = null;
    private $translations = [];
    private $currentLanguage = 'en';
    private $supportedLanguages = ['en', 'de'];

    /**
     * Private constructor for singleton pattern
     */
    private function __construct() 
    {
        $this->initializeLanguage();
        $this->loadTranslations();
    }

    /**
     * Get singleton instance
     */
    public static function getInstance(): self 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Initialize language from session or URL parameter
     */
    private function initializeLanguage(): void 
    {
        // Check for language parameter in URL
        if (isset($_GET['lang']) && in_array($_GET['lang'], $this->supportedLanguages)) {
            $this->currentLanguage = $_GET['lang'];
            $_SESSION['language'] = $this->currentLanguage;
        }
        // Check session for stored language
        elseif (isset($_SESSION['language']) && in_array($_SESSION['language'], $this->supportedLanguages)) {
            $this->currentLanguage = $_SESSION['language'];
        }
        // Default to English
        else {
            $this->currentLanguage = 'en';
            $_SESSION['language'] = 'en';
        }
    }

    /**
     * Load translations for current language
     */
    private function loadTranslations(): void 
    {
        $translationFile = __DIR__ . '/../../includes/i18n/translations/' . $this->currentLanguage . '.json';

        if (file_exists($translationFile)) {
            $jsonContent = file_get_contents($translationFile);
            $this->translations = json_decode($jsonContent, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                error_log('Error loading translations: ' . json_last_error_msg());
                $this->translations = [];
            }
        } else {
            error_log('Translation file not found: ' . $translationFile);
        }
    }

    /**
     * Get translated text by key
     */
    public function get(string $key, string $default = ''): mixed 
    {
        $keys = explode('.', $key);
        $value = $this->translations;

        foreach ($keys as $k) {
            if (isset($value[$k])) {
                $value = $value[$k];
            } else {
                return $default ?: $key;
            }
        }

        return $value;
    }

    /**
     * Get current language code
     */
    public function getCurrentLanguage(): string 
    {
        return $this->currentLanguage;
    }

    /**
     * Get all supported languages
     */
    public function getSupportedLanguages(): array 
    {
        return $this->supportedLanguages;
    }

    /**
     * Check if language is supported
     */
    public function isLanguageSupported(string $language): bool 
    {
        return in_array($language, $this->supportedLanguages);
    }

    /**
     * Get language name for display
     */
    public function getLanguageName(?string $languageCode = null): string 
    {
        $languageCode = $languageCode ?: $this->currentLanguage;

        $languageNames = [
            'en' => 'English',
            'de' => 'Deutsch'
        ];

        return isset($languageNames[$languageCode]) ? $languageNames[$languageCode] : $languageCode;
    }

    /**
     * Get URL with language parameter
     */
    public function getLanguageUrl(string $language, ?string $currentUrl = null): string 
    {
        if ($currentUrl === null) {
            $currentUrl = $_SERVER['REQUEST_URI'];
        }

        // Parse the URL to handle parameters properly
        $parsedUrl = parse_url($currentUrl);
        $path = $parsedUrl['path'] ?? '';
        
        // Parse existing query parameters
        $queryParams = [];
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
        }
        
        // Set the language parameter
        $queryParams['lang'] = $language;
        
        // Rebuild the URL
        $queryString = http_build_query($queryParams);
        
        return $path . ($queryString ? '?' . $queryString : '');
    }
}