<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 16:33
 */
class Cache1 extends CI_Controller
{
    public function index()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $cache1 = $cache2 = $cache3 = $defaultCache = $score = $inScore = $decScore = 0;

        if ($this->cache->memcached->is_supported()) {
            $cache1 = $this->cache->memcached->get('memcache');
            if ($cache1 == null) {
                $cache1 = 'm'.time();
                $this->cache->memcached->save('memcache', $cache1, 10);
            }
        }

        if ($this->cache->redis->is_supported()) {
            $cache2 = $this->cache->redis->get('redis');
            if ($cache2 == null) {
                $cache2 = 'r'.time();
                $this->cache->redis->save('redis', $cache2, 10);
            }
            $this->cache->redis->save('score', rand());
            $score = $this->cache->redis->get('score');
            $inScore = $this->cache->redis->increment('score', 10);
            $decScore = $this->cache->redis->decrement('score');
        }

        $cache3 = $this->cache->file->get('file');
        if ($cache3 == null) {
            $cache3 = 'f'.time();
            $this->cache->file->save('file', $cache3, 10);
        }
        $defaultCache = $this->cache->get('cache_item_id');
        if ($defaultCache == null) {
            $defaultCache = 'def'.time();
            $this->cache->save('cache_item_id', $defaultCache, 10);
        }
        $data = array(
            'memcache' => $cache1,
            'redis' => $cache2,
            'file' => $cache3,
            'defaultCache' => $defaultCache,
            'score' => $score,
            'inScore' => $inScore,
            'decScore' => $decScore,
            'time' => time()
        );
        $this->load->view('Cache1/index', $data);
    }
}