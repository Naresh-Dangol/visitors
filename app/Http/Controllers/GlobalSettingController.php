<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use Image;

use CountryState;

class GlobalSettingController extends Controller
{
    public function global_setting(){

      //$countries = CountryState::getCountries();
      //dd($countries);

       // $states = CountryState::getStates('NP');

        

    	  $global_setting = GlobalSetting::find(1);

    	return view('global_setup',compact('global_setting'));
    }

    // public function create(Request $request){
    // 	$data = $request->all();

    // 	if ($request->hasFile('fav_icon')) {
    //       $favicon = $request->file('fav_icon');
    //       $data['fav_icon'] = time() . '_' . $request->file('fav_icon')->getClientOriginalName();

    //       $destinationPath = public_path('image/');
    //         $favicon->move($destinationPath,$data['fav_icon']);           
    //     } 


    //   if ($request->hasFile('logo')) {

    //       $logo = $request->file('logo');

    //       $data['logo'] = time() . '_' . $request->file('logo')->getClientOriginalName();
    //       $destinationPath = public_path('image/');
    //       $logo->move($destinationPath,$data['logo']);          
    //     } 

    //     GlobalSetting::create($data);
    //     return redirect()->back()->with('success','Data Added Successfully!!');
    // }

    public function updateSettings(Request $request){
          $request->offsetUnset('_token'); // Confirmed _token field is gone.
          
          $data = $request->all(); 
           $setting = GlobalSetting::find(1);

          if ($request->hasFile('fav_icon')) {
            $fav_icon_path = public_path('image/'). $setting->fav_icon;
            if( !empty($setting->fav_icon)){ 
                if(file_exists($fav_icon_path)){             
                    unlink('image/' . $setting->fav_icon);
                }
            }

          $favicon = $request->file('fav_icon');
          $data['fav_icon'] = time() . '_' . $request->file('fav_icon')->getClientOriginalName();
          $destinationPath = public_path('image/');
          $fav = Image::make($favicon->getRealPath());
          $fav->resize(120,32,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $data['fav_icon'] );            
      } 

      if ($request->hasFile('logo')) {
        $logo_path = public_path('image').'/' . $setting->logo;
            if( !empty($setting->logo)){  
                if(file_exists($logo_path))    {
                  unlink('image/' . $setting->logo);  
                }            
            }

        $site_logo = $request->file('logo');
        $data['logo'] = time() . '_' . $request->file('logo')->getClientOriginalName();

        $destinationPath = public_path('image/');
        $logo = Image::make($site_logo->getRealPath());
        $logo->resize(300,252,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $data['logo'] );
    }       

    GlobalSetting::where('id', 1)->update($data);
    return redirect()->back()->with('success', 'Settings update has been successful!');
}



}
