<?php

namespace App\Http\Controllers\Api;

use App\Models\Game\Raid;
use Illuminate\Http\Request;
use App\Http\Resources;
use App\Models\Game\Expansion;

class InstanceController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of raids based on expansion.
     *
     * @param  \App\Models\Game\Expansion  $expansion
     * @return \Illuminate\Http\Response
     */
    public function listByExpansion(Expansion $expansion): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return Resources\Raid::collection($expansion->raids);
    }
}
