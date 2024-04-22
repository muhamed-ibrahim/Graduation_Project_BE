<?php

namespace App\Http\Controllers\Api\parent\children;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Child;


class ChildrenController extends Controller
{
    public function addChild(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birthdate' => 'required|date',
            'image' => 'required|image',
            'gender' => 'required|string|in:male,female',
            'childbirth_certificate' => 'required|image',
        ]);
        // add child for parent
        $user = \Auth::user();
        $child = new Child($data);
        $child->parent_id = $user->id;
        $child->save();
        // upload image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/children',$image_name);
            $child->image = $image_name;
            $child->save();
        }
        // upload childbirth_certificate
        if($request->hasFile('childbirth_certificate')){
            $childbirth_certificate = $request->file('childbirth_certificate');
            $childbirth_certificate_name = time().'_'.$childbirth_certificate->getClientOriginalName();
            $childbirth_certificate->storeAs('public/children',$childbirth_certificate_name);
            $child->childbirth_certificate = $childbirth_certificate_name;
            $child->save();
        }
        return response()->json(['message' => 'Child added successfully'], 201);

    }


}
