<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ClientRequest $request)
    {
        $inputs = $request->all();
        $validated = $request->validated();
        return view('confirm',['inputs'=>$inputs])->with($validated);
        }


    public function process(Request $request)
    {
        $action = $request->get('action');
        $inputs = $request->all();
        if ($action === 'submit') {
            Contact::create($inputs);
            return redirect('/complete');
        }else{
            return redirect('/')->withInput($inputs);
        }
    }

    public function complete()
    {
        return view('thank');
    }

    public function manegement()
    {
        $items = Contact::Paginate(10);
        return view('manegement', [
            'items' => $items,
            'name' => '',
            'email' => '',
            'gender'=> '',
            'date1' =>'',
            'date2' =>'',
        ]);
    }

    public function find(Request $request)
    {
        $query = Contact::query();

        if(!empty([
            $request->input('date1'),
            $request->input('date2'),
        ]))
            {
                $start = date('Y/m/d 00:00:00',strtotime($request->input('date1')));
                $end   = date('Y/m/d 00:00:00',strtotime($request->input('date2')));
            }
        if(empty($request->input('date1'))){ $start = '200-01-01 00:00:00'; }
        if(empty($request->input('date2'))){ $end   = '9999-12-31 23:59:59'; }

        $items = $query->where('fullname', 'LIKE',"%{$request->input('name')}%")
        ->where('email', 'LIKE',"%{$request->input('email')}%")
        ->where('gender', 'LIKE',"%{$request->input('gender')}%")
        ->where('gender', 'LIKE',"%{$request->input('gender')}%")
        ->whereBetween('created_at',[$start,$end])->paginate(10);

        $param = [
            'items' => $items,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'date1' => $request->input('date1'),
            'date2' => $request->input('date2'),

        ];
        return view('find', $param);
    }

    public function delete(Request $request)
    {
        // idで判別し、該当データを削除
        Contact::find($request->id)->delete();
        return redirect('manegement');
    }
}