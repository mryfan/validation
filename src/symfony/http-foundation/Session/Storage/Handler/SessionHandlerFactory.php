<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fy97Validation\Symfony\Component\HttpFoundation\Session\Storage\Handler;

use Doctrine\DBAL\DriverManager;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\Cache\Traits\RedisClusterProxy;
use Symfony\Component\Cache\Traits\RedisProxy;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class SessionHandlerFactory
{
    /**
     * @param \Redis|\RedisArray|\RedisCluster|\Predis\ClientInterface|RedisProxy|RedisClusterProxy|\Memcached|\PDO|string $connection Connection or DSN
     */
    public static function createHandler($connection): AbstractSessionHandler
    {
        if (!\is_string($connection) && !\is_object($connection)) {
            throw new \TypeError(sprintf('Argument 1 passed to "%s()" must be a string or a connection object, "%s" given.', __METHOD__, \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::get_debug_type($connection)));
        }

        if ($options = \is_string($connection) ? parse_url($connection) : false) {
            parse_str($options['query'] ?? '', $options);
        }

        switch (true) {
            case $connection instanceof \Redis:
            case $connection instanceof \RedisArray:
            case $connection instanceof \RedisCluster:
            case $connection instanceof \Predis\ClientInterface:
            case $connection instanceof RedisProxy:
            case $connection instanceof RedisClusterProxy:
                return new RedisSessionHandler($connection);

            case $connection instanceof \Memcached:
                return new MemcachedSessionHandler($connection);

            case $connection instanceof \PDO:
                return new PdoSessionHandler($connection);

            case !\is_string($connection):
                throw new \InvalidArgumentException(sprintf('Unsupported Connection: "%s".', \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::get_debug_type($connection)));
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'file://'):
                $savePath = substr($connection, 7);

                return new StrictSessionHandler(new NativeFileSessionHandler('' === $savePath ? null : $savePath));

            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'redis:'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'rediss:'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'memcached:'):
                if (!class_exists(AbstractAdapter::class)) {
                    throw new \InvalidArgumentException(sprintf('Unsupported DSN "%s". Try running "composer require symfony/cache".', $connection));
                }
                $handlerClass = \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'memcached:') ? MemcachedSessionHandler::class : RedisSessionHandler::class;
                $connection = AbstractAdapter::createConnection($connection, ['lazy' => true]);

                return new $handlerClass($connection, array_intersect_key($options ?: [], ['prefix' => 1, 'ttl' => 1]));

            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'pdo_oci://'):
                if (!class_exists(DriverManager::class)) {
                    throw new \InvalidArgumentException(sprintf('Unsupported DSN "%s". Try running "composer require doctrine/dbal".', $connection));
                }
                $connection = DriverManager::getConnection(['url' => $connection])->getWrappedConnection();
                // no break;

            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'mssql://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'mysql://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'mysql2://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'pgsql://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'postgres://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'postgresql://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'sqlsrv://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'sqlite://'):
            case \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::str_starts_with($connection, 'sqlite3://'):
                return new PdoSessionHandler($connection, $options ?: []);
        }

        throw new \InvalidArgumentException(sprintf('Unsupported Connection: "%s".', $connection));
    }
}
