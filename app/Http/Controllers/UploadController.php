<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Item;
use App\models\ItemDetail;
use App\Models\ItemDetails;



class UploadController extends Controller
{
        public function uploadForm()
        {
          
                return view('Upload_form');
        }
        public function uploadSubmit(Request $request)
        {
            $this->validate($request, [
            'name' => 'required',
            'photos'=>'required',
             ]);
        if($request->hasFile('photos'))
        {
                $allowedfileExtension=['pdf','jpg','png','docx'];
                $files = $request->file('photos');
                foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
        //dd($check);
        if($check)
            {
                $items= Item::create($request->all());
                foreach ($request->photos as $photo) {
                $filename = $photo->store('photos');
                ItemDetails::create([
                'item_id' => $items->id,
                'filename' => $filename
                ]);
        }
                echo "Upload Successfully";
            }
                else
            {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        }
        }
        
        public function uploadDocument(Request $request) {
            $title = $request->file('name');
            
            // Get the uploades file with name document
            $document = $request->file('document');
            // Required validation
            $request->validate([
                'name' => 'required|max:255',
                'document' => 'required'
            ]);
            // Check if uploaded file size was greater than
            // maximum allowed file size
            if ($document->getError() == 1) {
                $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
                $error = 'The document size must be less than ' . $max_size . 'Mb.';
                return redirect()->back()->with('flash_danger', $error);
            }
            
            $data = [
                'document' => $document
            ];
            
            // If upload was successful
            // send the email
          //  $to_email = test@example.com;
            //\Mail::to($to_email)->send(new \App\Mail\Upload($data));
            //return redirect()->back()->with('flash_success', 'Your document has been uploaded.');
         }
         
}