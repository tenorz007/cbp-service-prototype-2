<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /** @var Campaign campaign */
    private $campaign;

    /** @var Request request */
    private $request;

    public function __construct(Campaign $campaign, Request $request)
    {
        $this->campaign = $campaign;
        $this->request = $request;
    }

    public function index()
    {
        return response()->json($this->campaign->paginate(10));
    }

    public function fetchPresets(int $campaignId)
    {
       return response()->json($this->campaign->find($campaignId)->presets()->paginate(5));
    }
}
