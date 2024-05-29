<?php

namespace App\Http\Controllers;

use App\Http\Requests\JsonRequest;
use App\Http\Resources\HouseResource;
use App\Models\House;

class JsonResponseController extends Controller
{
    public function index(House $house, JsonRequest $request)
    {
        $houses = $house

        //price
        ->when($request->priceFrom,function ($query) use ($request){
            $query->where('price','>=',$request->priceFrom);
        })
        ->when($request->price,function ($query) use ($request){
            $query->where('price','=',$request->price);
        })
        ->when($request->priceTo,function ($query) use ($request){
            $query->where('price','<=',$request->priceTo);
        })
        //total_area
        ->when($request->totalAreaFrom,function ($query) use ($request){
            $query->where('total_area','>=',$request->totalAreaFrom);
        })
        ->when($request->totalArea,function ($query) use ($request){
            $query->where('total_area','=',$request->totalArea);
        })
        ->when($request->totalAreaTo,function ($query) use ($request){
            $query->where('total_area','<=',$request->totalAreaTo);
        })
        //covered_area
        ->when($request->CoveredAreaFrom,function ($query) use ($request){
            $query->where('covered_area','>=',$request->CoveredAreaFrom);
        })
        ->when($request->CoveredArea,function ($query) use ($request){
            $query->where('covered_area','=',$request->CoveredArea);
        })
        ->when($request->CoveredAreaTo,function ($query) use ($request){
            $query->where('covered_area','<=',$request->CoveredAreaTo);
        })
        //rooms_number
        ->when($request->numberRoomsFrom,function ($query) use ($request){
            $query->where('rooms_number','>=',$request->numberRoomsFrom);
        })
        ->when($request->numberRooms,function ($query) use ($request){
            $query->where('rooms_number','=',$request->numberRooms);
        })     
        ->when($request->numberRoomsTo,function ($query) use ($request){
            $query->where('rooms_number','<=',$request->numberRoomsTo);
        })
        //sort
        ->when($request->sortBy && $request->sortOrder,function ($query) use ($request){
            $query->orderby($request->sortBy,$request->sortOrder);
        })
        ->paginate();

        return HouseResource::collection($houses);
    }
}
