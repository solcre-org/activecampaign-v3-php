<?php

namespace Mediatoolkit\ActiveCampaign\Campaigns;


use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Campaigns
 * @package Mediatoolkit\ActiveCampaign\Campaigns
 * @see https://developers.activecampaign.com/reference#campaigns
 */
class Campaigns extends Resource
{

    /**
     * Create a campaign
     * @see https://developers.activecampaign.com/reference#create-a-new-message
     * @param array $campaign
     * @return string
     */
    public function create(array $campaign)
    {
        $request_url = \sprintf('%s/admin/api.php?api_action=campaign_create&api_output=json&api_key=%s', $this->client->getApiUrl(), $this->client->getApiToken());
        $req = $this->client->getClient()->post($request_url, [
            'form_params' => $campaign
        ]);

        return $req->getBody()->getContents();
    }

    public function delete($id)
    {
        $request_url = \sprintf('%s/admin/api.php?api_action=campaign_delete&api_output=json&api_key=%s&id=%s', $this->client->getApiUrl(), $this->client->getApiToken(), $id);
        $req = $this->client
            ->getClient()
            ->delete($request_url);

        return 200 === $req->getStatusCode();
    }

    public function updateCampaignStatus($id, $status, $dateTime = null)
    {
        $request_url = \sprintf('%s/admin/api.php?api_action=campaign_status&api_output=json&api_key=%s&id=%s&status=%s&sdate=%s', $this->client->getApiUrl(), $this->client->getApiToken(), $id, 1, $date);
        $req = $this->client->getClient()->get($request_url);

        return $req->getBody()->getContents();
    }

    public function send(array $campaign)
    {
        $request_url = \sprintf('%s/admin/api.php?api_action=campaign_send&api_output=json&api_key=%s', $this->client->getApiUrl(), $this->client->getApiToken());
        $req = $this->client->getClient()->post($request_url, [
            'form_params' => $campaign
        ]);

        return $req->getBody()->getContents();
    }
}