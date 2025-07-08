<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait SettingsTrait
{
  
 
    public function uploadImageAboutUs($request, $fieldName, $destinationPath)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path($destinationPath), $imageName);
            return $destinationPath . '/' . $imageName;
        }
        return null;
    } 

    public function uploadHeaderImageAboutUs($request, $fieldName, $destinationPath)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path($destinationPath), $imageName);
            return $destinationPath . '/' . $imageName;
        }
        return null;
    }

    public function handleUpdateAboutUsImage($request, $aboutUs)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/about'), $imageName);
    
            // Check if old image exists before deleting
            if ($aboutUs->image && file_exists(public_path($aboutUs->image))) {
                unlink(public_path($aboutUs->image));
            }
    
            // Update the new image path
            $aboutUs->image = 'assets/images/about/' . $imageName;

            $aboutUs->save();
        }
    
        if ($request->hasFile('header_image')) {
            $image = $request->file('header_image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/about'), $imageName);
    
            // Check if old header image exists before deleting
            if ($aboutUs->header_image && file_exists(public_path($aboutUs->header_image))) {
                unlink(public_path($aboutUs->header_image));
            }
    
            // Update the new header image path
            $aboutUs->header_image = 'assets/images/about/' . $imageName;
            $aboutUs->save();
        }
        if ($request->hasFile('banner_one')) {
            $image = $request->file('banner_one');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/about'), $imageName);
    
            // Check if old banner image exists before deleting
            if ($aboutUs->banner_one && file_exists(public_path($aboutUs->banner_one))) {
                unlink(public_path($aboutUs->banner_one));
            }
    
            // Update the new banner image path
            $aboutUs->banner_one = 'assets/images/about/' . $imageName;
            $aboutUs->save();
        }
        if ($request->hasFile('banner_two')) {
            $image = $request->file('banner_two');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/about'), $imageName);
    
            // Check if old banner image exists before deleting
            if ($aboutUs->banner_two && file_exists(public_path($aboutUs->banner_two))) {
                unlink(public_path($aboutUs->banner_two));
            }
    
            // Update the new banner image path
            $aboutUs->banner_two = 'assets/images/about/' . $imageName;
            $aboutUs->save();
        }
        if ($request->hasFile('banner_three')) {
            $image = $request->file('banner_three');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/about'), $imageName);
    
            // Check if old banner image exists before deleting
            if ($aboutUs->banner_three && file_exists(public_path($aboutUs->banner_three))) {
                unlink(public_path($aboutUs->banner_three));
            }
    
            // Update the new banner image path
            $aboutUs->banner_three = 'assets/images/about/' . $imageName;
            $aboutUs->save();
        }
    }
    

    public function uploadImageExecutiveSummary($request, $fieldName, $destinationPath)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path($destinationPath), $imageName);
            return $destinationPath . '/' . $imageName;
        }
        return null;
    }
    public function handleUpdateExecutiveSummaryImage($request, $executiveSummary){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('executiveSummaryImage'), $imageName);
            if ($executiveSummary->image) {
                unlink(public_path($executiveSummary->image));
            }
            $executiveSummary->image = 'executiveSummaryImage/' . $imageName;
            $executiveSummary->save();
        }
        
    }
}