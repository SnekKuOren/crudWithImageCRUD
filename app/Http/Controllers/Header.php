<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Headers;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class Header extends Controller
{
    public function getForm(){
    	return view('header.form');
    }
	public function store(Request $data){
	//display message when field is not there
    	$validation = Validator::make($data->all(), array(
    		'title' => 'required',
    		'sub_title' => 'required',
    		'image' => 'required|mimes:jpg,jpeg|Max:1000',
    		));
    	//redirect towards the same page
    	if($validation->fails()){
    		return Redirect::to('header/form')->withErrors($validation);
    	}else{

    		$logo = $data->file('image');
    		$upload = 'uploads/logo';
    		$filename = $logo->getClientOriginalName();
    		$success = $logo->move($upload, $filename);

    		if($success){

    		$table = new Headers;
    		$table->title = $data->Input('title');
    		$table->sub_title = $data->Input('sub_title');
    		$table->image = $filename;
    		$table->save();
    		//print_r($table);exit();
    		return Redirect::to('header/form')->with('success', 'Data submitted');
    	}
    	}
    }

    public function display(){
        $model = Headers::all();

        return view('header.show', compact('model'));
    }

    //test actual can call to get form from edit page
    public function getEditForm($id){
        $model = Headers::find($id);
        return view('header.edit', compact('model'));
    }

    public function updateData(Request $data, $id){

        $validation = Validator::make($data->all(), array(
            'image' => 'mimes:jpg,jpeg|Max:1000',
            ));
        if ($validation->fails()){
            return Redirect::to('header/editform'.$id)->withErrors($validation);
        }else{
            $logo = $data->file('image');
            $upload = 'uploads/logo';
            $filename = $logo->getClientOriginalName();
            $success = $logo->move($upload, $filename);

            if($success){
                $table = new Headers;
                $table = array(
                    'title' => $data->Input('title'),
                    'sub_title' => $data->Input('sub_title'),
                    'image' => $filename
                    );
                
                Headers::where('id', $id)->update($table);
                //print_r($table);exit();
                return Redirect::to('header/showdata')->with('success', 'Update successfully');
            }
        }
    }
}
