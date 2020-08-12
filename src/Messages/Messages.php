<?php

namespace Mediatoolkit\ActiveCampaign\Messages;


use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Messages
 * @package Mediatoolkit\ActiveCampaign\Messages
 * @see https://developers.activecampaign.com/reference#messages
 */
class Messages extends Resource
{

    /**
     * Create a message
     * @see https://developers.activecampaign.com/reference#create-a-new-message
     * @param array $message
     * @return string
     */
    public function create(array $message)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/messages', [
                'json' => [
                    'message' => $message
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Retrieve all lists or a list when id is not null
     * @see https://developers.activecampaign.com/reference#retrieve-a-list
     * @param null $id
     * @param array $query_params
     * @return string
     */
    public function retrieve($id = null, array $query_params = [])
    {
        $uri = '/api/3/lists';
        if (! is_null($id)) {
            $uri .= '/' . $id;
        }
        $req = $this->client
            ->getClient()
            ->get($uri, [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    public function update($id, array $message)
    {
        $uri = '/api/3/messages/' . $id;
        $req = $this->client
            ->getClient()
            ->put($uri, [
                'json' => [
                    'message' => $message
                ]
            ]);

        return $req->getBody()->getContents();
    }

}