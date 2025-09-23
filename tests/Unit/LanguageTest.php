<?php
use PHPUnit\Framework\TestCase;
use App\i18n\Language;

class LanguageTest extends TestCase
{
    private function resetSingleton(): void
    {
        $ref = new ReflectionClass(Language::class);
        $prop = $ref->getProperty('instance');
        $prop->setAccessible(true);
        $prop->setValue(null, null);
    }

    protected function setUp(): void
    {
        parent::setUp();
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
        }
        $_SESSION = [];
        $_GET = [];
        $this->resetSingleton();
    }

    public function testDefaultLanguageIsEn(): void
    {
        $lang = Language::getInstance();
        $this->assertSame('en', $lang->getCurrentLanguage());
    }

    public function testOverrideLanguageViaQueryParam(): void
    {
        $_GET['lang'] = 'de';
        $lang = Language::getInstance();
        $this->assertSame('de', $lang->getCurrentLanguage());
        $this->assertSame('de', $_SESSION['language']);
    }

    public function testUnsupportedLanguageIgnored(): void
    {
        $_GET['lang'] = 'fr';
        $lang = Language::getInstance();
        $this->assertSame('en', $lang->getCurrentLanguage());
    }
}
