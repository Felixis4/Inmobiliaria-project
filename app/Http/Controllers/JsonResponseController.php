<?php

namespace App\Http\Controllers;

use App\Http\Requests\JsonRequest;
use App\Http\Resources\HouseResource;
use App\Models\House;

class JsonResponseController extends Controller
{
    public function index(JsonRequest $request)
    {
        return HouseResource::collection(House::query()->with(['property'])

        //title
        ->when($request->title, function ($query) use ($request){
            $query->where('title',$request->title);
        })
        //price
        ->when($request->priceFrom,function ($query) use ($request){
            $query->where('price','>=',$request->priceFrom);
        })
        ->when($request->price,function ($query) use ($request){
            $query->where('price',$request->price);
        })
        ->when($request->priceTo,function ($query) use ($request){
            $query->where('price','<=',$request->priceTo);
        })
        //total_area
        ->when($request->totalAreaFrom,function ($query) use ($request){
            $query->where('total_area','>=',$request->totalAreaFrom);
        })
        ->when($request->totalArea,function ($query) use ($request){
            $query->where('total_area',$request->totalArea);
        })
        ->when($request->totalAreaTo,function ($query) use ($request){
            $query->where('total_area','<=',$request->totalAreaTo);
        })
        //covered_area
        ->when($request->coveredAreaFrom,function ($query) use ($request){
            $query->where('covered_area','>=',$request->coveredAreaFrom);
        })
        ->when($request->coveredArea,function ($query) use ($request){
            $query->where('covered_area',$request->coveredArea);
        })
        ->when($request->coveredAreaTo,function ($query) use ($request){
            $query->where('covered_area','<=',$request->coveredAreaTo);
        })
        //rooms_number
        ->when($request->numberRoomsFrom,function ($query) use ($request){
            $query->where('rooms_number','>=',$request->numberRoomsFrom);
        })
        ->when($request->numberRooms,function ($query) use ($request){
            $query->where('rooms_number',$request->numberRooms);
        })
        ->when($request->numberRoomsTo,function ($query) use ($request){
            $query->where('rooms_number','<=',$request->numberRoomsTo);
        })

        //Properties

        //city_id
        ->when($request->cityId, function ($query) use ($request){
            $query->whereHas('property', function ($query) use ($request){
                $query->where('city_id',$request->cityId);
            });
        })
        //type
        ->when($request->type,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('type',$request->type);
            });
        })
        //light
        ->when($request->light,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('light',$request->light);
            });
        })
        //natural_gas
        ->when($request->naturalGas,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('natural_gas',$request->naturalGas);
            });
        })
        //phone
        ->when($request->phone,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('phone',$request->phone);
            });
        })
        //water
        ->when($request->water,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('water',$request->water);
            });
        })
        //sewers
        ->when($request->sewers,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('sewers',$request->sewers);
            });
        })
        //internet
        ->when($request->internet,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('internet',$request->internet);
            });
        })
        //asphalt
        ->when($request->asphalt,function ($query) use ($request){
            $query->whereHas('property', function($query) use ($request){
                $query->where('asphalt',$request->asphalt);
            });
        })

        //sortBy
        ->when($request->sortBy,function ($query) use ($request){
                $query->orderBy($request->sortBy);
        })
        ->paginate());

    }
}
