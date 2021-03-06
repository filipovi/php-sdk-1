<?php

namespace MR\SDK\TokenStorage;

use Psr\Cache\CacheItemPoolInterface;

class CacheTokenStorage implements TokenStorageInterface
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @param CacheItemPoolInterface $cache
     */
    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    public function save($key, array $token)
    {
        $item = $this->cache->getItem($key);
        $item->set(serialize($token));
        $item->expiresAfter(5184000); // 60 days in seconds => see config.yml in API

        return $this->cache->save($item);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        $item = $this->cache->getItem($key);

        return $item->isHit() ? unserialize($item->get()) : false;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return $this->cache->getItem($key)->isHit();
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        return $this->cache->deleteItem($key);
    }
}
