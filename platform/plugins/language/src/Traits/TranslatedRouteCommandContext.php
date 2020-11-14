<?php

namespace Botble\Language\Traits;

use Language;

trait TranslatedRouteCommandContext
{
    /**
     * Returns whether a given locale is supported.
     *
     * @param string $locale
     * @return bool
     */
    protected function isSupportedLocale($locale)
    {
        return in_array($locale, Language::getSupportedLanguagesKeys());
    }

    /**
     * @return string
     */
    protected function getBootstrapPath()
    {
        if (method_exists($this->laravel, 'bootstrapPath')) {
            return $this->laravel->bootstrapPath();
        }

        return $this->laravel->basePath() . DIRECTORY_SEPARATOR . 'bootstrap';
    }

    /**
     * @param string $locale
     * @return string
     */
    protected function makeLocaleRoutesPath($locale = '')
    {
        $path = $this->laravel->getCachedRoutesPath();

        if (!$locale) {
            return $path;
        }

        return substr($path, 0, -4) . '_' . $locale . '.php';
    }
}
