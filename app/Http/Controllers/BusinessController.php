<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\Categorie;
use App\Models\Location;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Brick\PhoneNumber\PhoneNumber;
use Brick\PhoneNumber\PhoneNumberFormat;
use Brick\PhoneNumber\PhoneNumberParseException;
use App\Http\Resources\BusinessCollection;
use App\Http\Resources\BusinessResource;

class BusinessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list() {
        return BusinessResource::collection(Business::select('*')->paginate(5));
    }

    public function search(Request $request) {
        $data = Business::with('coordinate', 'categorie', 'location');
            $data->where('price', 'LIKE', '%' . $request->price . '%');
            $data->whereRelation('coordinate', 'latitude', 'LIKE', '%' . $request->latitude . '%');
            $data->whereRelation('coordinate', 'longtitude', 'LIKE', '%' . $request->longtitude . '%');
            $data->whereRelation('categorie', 'title', 'LIKE', '%' . $request->categorie . '%');
            $data->whereRelation('location', 'city', 'LIKE', '%' . $request->location . '%');
        $search = $data->GET();
        return response()->json(
            $search
        );
    }

    public function detail(Request $request) {
        return new BusinessResource(Business::with('categorie', 'location', 'photo')->where('id', $request->id)->first());
    }

    public function store(Request $request) {
        $this->validate($request, [
            'distance' => 'required',
            'name' => 'required',
        ]);
        $category = new Categorie;
        $category->title = $request->title;
        $category->alias = Str::of($request->title)->lower();
        $category->save();
        $location = new Location;
        $location->address1 = $request->address1;
        $location->address2 = $request->address2;
        $location->address3 = $request->address3;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->country = $request->country;
        $location->zip_code = $request->zip_code;
        $location->save();
        $data = new Business;
        $data->id = Str::random(22);
        $data->alias = $request->alias;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->distance = $request->distance;
        $data->image_url = $request->image_url;
        $data->is_claimed = $request->is_claimed;
        $data->is_closed = $request->is_closed;
        $data->date_opened = $request->date_opened;
        $data->date_closed = $request->date_closed;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $number = PhoneNumber::parse($request->phone);
        $nomor = $number->format(PhoneNumberFormat::INTERNATIONAL);
        $data->display_phone = $nomor;
        $data->photo_count = $request->photo_count;
        $data->price = $request->price;
        $data->rating = $request->rating;
        $data->review_count = $request->review_count;
        $data->transactions = $request->transactions;
        $data->location_id = $location->id;
        $data->categorie_id = $category->id;
        $data->yelp_menu_url = $request->yelp_menu_url;
        $data->save();
        $photo = new Photo;
        $photo->business_id = $data->id;
        $photo->photo_id = Str::random(22);
        $photo->url = $request->url;
        $photo->caption = $request->caption;
        $photo->width = $request->width;
        $photo->height = $request->height;
        $photo->is_user_submitted = $request->is_user_submitted;
        $photo->user_id = $request->user_id;
        $photo->label = $request->label;
        $photo->save();
        return response()->json([
            $data
        ]);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'distance' => 'required',
            'name' => 'required',
        ]);
        $data = Business::where('id', $request->id)->first();
        $category = new Categorie;
        $category->title = $request->title;
        $category->alias = Str::of($request->title)->lower();
        $category->save();
        $location = new Location;
        $location->address1 = $request->address1;
        $location->address2 = $request->address2;
        $location->address3 = $request->address3;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->country = $request->country;
        $location->zip_code = $request->zip_code;
        $location->save();
        $data = new Business;
        $data->id = Str::random(22);
        $data->alias = $request->alias;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->distance = $request->distance;
        $data->image_url = $request->image_url;
        $data->is_claimed = $request->is_claimed;
        $data->is_closed = $request->is_closed;
        $data->date_opened = $request->date_opened;
        $data->date_closed = $request->date_closed;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $number = PhoneNumber::parse($request->phone);
        $nomor = $number->format(PhoneNumberFormat::INTERNATIONAL);
        $data->display_phone = $nomor;
        $data->photo_count = $request->photo_count;
        $data->price = $request->price;
        $data->rating = $request->rating;
        $data->review_count = $request->review_count;
        $data->transactions = $request->transactions;
        $data->location_id = $location->id;
        $data->categorie_id = $category->id;
        $data->yelp_menu_url = $request->yelp_menu_url;
        $data->save();
        $photo = new Photo;
        $photo->business_id = $data->id;
        $photo->url = $request->url;
        $photo->caption = $request->caption;
        $photo->width = $request->width;
        $photo->height = $request->height;
        $photo->is_user_submitted = $request->is_user_submitted;
        $photo->user_id = $request->user_id;
        $photo->label = $request->label;
        $photo->save();
        return response()->json([
            $data
        ]);
    }

    public function delete(Request $request) {
        $data = Business::where('id', $request->id)->first();
        $data->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Success delete Data',
        ]);
    }

}
