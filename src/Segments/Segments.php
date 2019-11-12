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
     * @param  $id
     * @return string
     */
    public function get($id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/segments/' . $id)->getBody()->getContents();
    }

    /**
     * List all segments
     * @see https://developers.activecampaign.com/reference#list-all-segments
     *
     * @param array $query_params
     * @param  $limit
     * @param  $offset
     * @return string
     */
    public function listAll()
    {
        return $this->client
            ->getClient()
            ->get('/api/3/segments')->getBody()->getContents();
    }

}
