Cachewarm
=========

(Magento Extension) Warm cache

1. Adds button to Cache Management
2. Click "Warm Cache" to put request in queue by adding a store config value.
3. Cron.php picks up request and deletes store config value.
4. Iterates all locations in all registered google sitemaps using curl.
