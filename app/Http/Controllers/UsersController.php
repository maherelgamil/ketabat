<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\User;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::simplePaginate(30);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = self::getUserRoles();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $request['password'] = \Hash::make($request->input('password'));
        $request['role'] = $request->input('role');
    
        //dd($request);        
        User::create($request->all());

        \Flash::success('New user has been added.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $roles = self::getUserRoles();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'email' => 'required|unique:users,email,' . $user->id,
            'retype_password' => 'same:password'
        ]);

        if ($request->input('password') == "") :
            $updateRequest['email'] = $request->input('email');
            $updateRequest['role'] = $request->input('role');
            $user->update($updateRequest);
        else :
            $request['password'] = \Hash::make($request->input('password'));
            $user->update($request->all());
        endif;

        \Flash::success('Your user has been Updated');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        if (! $user->remove) :

            \Flash::error('Default user cannot be removed.');

            return redirect()->route('admin.users.index');
        else :
            $user->delete();

            \Flash::success('User has been Deleted');

            return redirect()->route('admin.users.index');
        endif;
    }

    private static function getEnumValues($table, $column)
    {
        $type = DB::select( DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'") )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }

        return $enum;
    }

    private static function getUserRoles()
    {
        return self::getEnumValues('users', 'role');
    }
}
