<?php

namespace App\Http\Controllers\API;


use App\Models\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Http\Requests\VillageCreateRequest;
use App\Http\Requests\VillageUpdateRequest;
use App\Http\Resources\VillageResourceCollection;
use Illuminate\Http\Exceptions\HttpResponseException;

class VillageController extends Controller
{
    private function getVillage($id)
    {
        $villageData = Village::where('id', $id)->first();

        if (!$villageData) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    'message' => ['village with ' . $id . ' not found']
                ]
            ])->setStatusCode(404));
        }
        return $villageData;
    }

    /**
     * Display a listing of the resource.
     */
    public function getAllVillage()
    {
        $perPage = 10;
        $villages = Village::paginate($perPage);
        return new VillageResourceCollection($villages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createVillage(VillageCreateRequest $request)
    {

        $validatedData = $request->validated();
        $village = Village::create($validatedData);

        return response()->json([
            'message' => 'Data Created',
            'data' => new VillageResource($village),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function getVillageById($id)
    {
        $village = $this->getVillage($id);

        return response()->json([
            'message' => 'Data Retrieved',
            'data' => new VillageResource($village),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateVillageById($id, VillageUpdateRequest $request)
    {
        $village = $this->getVillage($id);

        $validatedData = $request->validated();

        $village->update($validatedData);

        return response()->json([
            'message' => 'Data Updated',
            'data' => new VillageResource($village),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteVillageById($id)
    {
        $village = $this->getVillage($id);
        $village->delete();
        return response()->json([
            'message'=>'Data deleted',
            'data' => null
        ])->setStatusCode(200);
    }
}
