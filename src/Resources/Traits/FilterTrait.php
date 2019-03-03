<?php
namespace Freshdesk\Resources\Traits;
/**
 * Create Trait
 *
 * @package Freshdesk\Resources\Traits
 */
trait FilterTrait
{
    /**
     * @param null $end string
     * @return string
     * @internal
     */
    abstract protected function endpoint($end = null);
    /**
     * @return \Freshdesk\Api
     * @internal
     */
    abstract protected function api();

    /**
     * Filter a resource
     *
     * Filter a resource by $query
     * Make sure to pass a valid $query string
     *
     * @api
     * @param string $query
     * @param int $page
     * @return array|null
     * @throws \Freshdesk\Exceptions\ApiException
     * @throws \Freshdesk\Exceptions\ConflictingStateException
     * @throws \Freshdesk\Exceptions\RateLimitExceededException
     * @throws \Freshdesk\Exceptions\UnsupportedContentTypeException
     */
    public function filter(string $query, $page = 1)
    {
        $end = '/search'.$this->endpoint();
        $query = [
            'query' => '"'.$query.'"',
            'page' => $page
        ];
        return $this->api()->request('GET', $end, null, $query);
    }
}