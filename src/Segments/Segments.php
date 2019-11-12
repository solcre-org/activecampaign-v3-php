<?php

namespace Mediatoolkit\ActiveCampaign\Segments;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Segments
 * @package Mediatoolkit\ActiveCampaign\Segments
 * @see https://developers.activecampaign.com/reference#segments
 */
class Segments extends Resource
{

    /**
     * Get a segment
     * @see https://developers.activecampaign.com/reference#retrieve-a-segment
     *
     * @param int $id
     * @return string
     */
    public function get(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/segments/' . $id);

        return $req->getBody()->getContents();
    }

    /**
     * List all segments
     * @see https://developers.activecampaign.com/reference#list-all-segments
     *
     * @param array $query_params
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public function listAll(array $query_params = [], int $limit = 20, int $offset = 0)
    {
        $query_params = array_merge($query_params, [
            'limit'  => $limit,
            'offset' => $offset
        ]);

        $req = $this->client
            ->getClient()
            ->get('/api/3/segments', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

}
