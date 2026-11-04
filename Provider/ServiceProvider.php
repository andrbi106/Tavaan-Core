<?php

declare(strict_types=1);

/**
 * تَوان | Tavaan — Service Provider (کلاس پایه)
 *
 * همهٔ Service Providerهای فریمورک و موتورها از این کلاس ارث می‌برند.
 *
 * چرخهٔ عمر:
 *   register()  →  boot()
 *
 * در register() فقط bindingهای سبک در Container ثبت می‌شوند.
 * در boot() راه‌اندازی سنگین انجام می‌شود (پس از ثبت همهٔ providerها).
 */

namespace Tavaan\Core\Provider;

use Tavaan\Core\Contracts\Container\ContainerInterface;

abstract class ServiceProvider
{
    public function __construct(
        protected readonly ContainerInterface $container
    ) {}

    /**
     * ثبت bindingها در Container.
     * در این stage نباید کار سنگین انجام شود.
     */
    abstract public function register(): void;

    /**
     * راه‌اندازی پس از ثبت همهٔ providerها.
     * پیش‌فرض: no-op. زیرکلاس‌ها برای راه‌اندازی override می‌کنند.
     */
    public function boot(): void
    {
        // no-op default
    }
}
