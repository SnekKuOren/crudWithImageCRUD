<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Students;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class Student extends Controller
{
    public function showdata(){

        $model = students::all();
        return view('student.show')->with('datas', $model);
    }

    public function getForm(){
    	return view('student.form');
	}

    public function store(Request $data){
    	
        //user must enter input base on preference
        $validation = Validator::make($data->all(), array(
            'first_name' => 'required| min:3|max:50',
            'last_name' => 'required| min:3|max:50', 
            'address' => 'required| min:3|max:500',  
        ));

        //print error message
        if ($validation->fails()){
            return Redirect::to('form')->witherrors($validation);
        }else{

    	$table = new Students;
    	$table->first_name = $data->Input('first_name');
    	$table->last_name = $data->Input('last_name');
    	$table->address = $data->Input('address');
    	//save changes on table
    	$table->save();

    	//redirect to file with message class
    	return Redirect::to('form')->with('message', 'Data has been submitted successfully');

    	//to see if the code is sent
    	//print_r($table);
    }

    }
    public function getEditForm($id){
        $edit = Students::find($id);
        return view('student.edit')->with('datas', $edit);
    }

    public function updateData(Request $formdata, $id){
        $table = Students::find($id);

        $table->first_name = $formdata->Input('first_name');
        $table->last_name = $formdata->Input('last_name');
        $table->address = $formdata->Input('address');
        $table->save();

        return Redirect::to('show')->with('updatemsg', 'Data Has been Updated');
    }

    public function destroy($id){
        $model = Students::find($id);
        $model->delete();
        return Redirect::to('show')->with('deletemsg', 'Data has been deleted successfully !!');
    }
}
