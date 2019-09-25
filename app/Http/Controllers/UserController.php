<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $users = User::whereNotIn('id', [auth()->id()])->paginate(20);

        return view('users.index', compact('users'));
    }

    public function create(User $model)
    {
        return view('users.create', compact('model'));
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'phone' => 'required|unique:users|digits:11',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
        $messages = [
            'name.requested' => 'Your Name Is Required',
            'phone.requested' => 'Your Phone Is Required',
            'email.requested' => 'Your Email Is Required',
            'password.requested' => 'Your Password Is Required',
        ];

        $this->validate($request, $rules, $messages);

        $request->merge(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        $user->api_token = Str::random(60);

        $user->save();

        flash()->message('Created Successfully');

        return redirect(route('user.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('users.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email|exists:users'
        ]);

        $user = User::findOrFail($id);

        $request->merge(['password' => bcrypt($request->password)]);

        $update = $user->update($request->all());

        flash()->success('Updated Successfully');

        return redirect(route('user.edit', $id));
    }

    public function destroy($id)
    {
        $record = User::findOrFail($id);

        $record->delete();

        flash()->success('Deleted Successfully');

        return back();
    }

    /*

    public function register(Request $request){

        $validator = validator()->make($request->all(),[

            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users|digits:11',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {

            $response = [

                'status' => 0,
                'message' => 'validator error',
                'data' => $validator->errors()

            ];

            return response()->json($response);

        }

        $request->merge(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        $user->api_token = Str::random(60);

        $user->save();

        $response = [

            'status' => 1,
            'message' => 'success',
            'data' => [
                'api_token' => $user->api_token,
                'User' => $user
            ]

        ];

        return response()->json($response);

    }

    */

}
