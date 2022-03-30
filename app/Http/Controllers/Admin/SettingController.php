<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('backend.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new Setting();
        $setting->name = $request->name;
        $setting->address = $request->address;
        $setting->contact = $request->contact;
        $setting->email = $request->email;
        $setting->facebook = $request->facebook;
        if($request->hasFile('logo')){
            $file = $request->logo;
            $newName = time() . $file->getClientOriginalName();
            $file->move('images',$newName);
            $setting->logo = "images/$newName";
        }
        $setting->save();
        toast('Record Saved Successfully!','success');
        return redirect("/setting");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('backend.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting =  Setting::find($id);
        $setting->name = $request->name;
        $setting->address = $request->address;
        $setting->contact = $request->contact;
        $setting->email = $request->email;
        $setting->facebook = $request->facebook;
        if($request->hasFile('logo')){
            $file = $request->logo;
            $newName = time() . $file->getClientOriginalName();
            $file->move('images',$newName);
            $setting->logo = "images/$newName";
        }
        $setting->update();
        toast('Record Updated Successfully!','success');

        return redirect("/setting");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        toast("Record Deleted Successfully","success");
        return redirect("/setting");
    }
}
