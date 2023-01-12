<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Repositories\Sql\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminController extends Controller
{

    protected $adminRepo;
    public function __construct(UserRepository $adminRepo)
    {
      $this->adminRepo = $adminRepo ;
    }

    public function index()
    {
        $admins = $this->adminRepo->getAll();
        return view('dashboard.backend.admins.index' , compact('admins'));
    }


    public function create()
    {
        return view('dashboard.backend.admins.create');
    }


    public function store(AdminRequest $request)
    {
        $data = $request->except('password' , 'img' , 'email_verified_at' , 'remember_token');

         $data['password'] = bcrypt($request->password) ;
         $data['email_verified_at'] =  now() ;
         $data['remember_token'] = Str::random(10) ;

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('admins');
        }

        $this->adminRepo->create($data);
        return redirect(route('admin.admins.index'))->with('success', __('models.added_successfully'));

    }




    public function edit($id)
    {
        $admin = $this->adminRepo->findOne($id);
        return view('dashboard.backend.admins.edit' , compact('admin'));
    }


    public function update(AdminRequest $request, $id)
    {
        $admin = $this->adminRepo->findOne($id);
        $data = $request->except('password' , 'img' );

        if(request()->has('password') && $request->password != null){
            $request_data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('img')) {

            Storage::delete($admin->img);

            $data['img'] = $request->file('img')->store('admins');

        } else {
            $data['img'] = $admin->img;
        }


        $admin->update($data);
        return redirect(route('admin.admins.index'))->with('success', __('models.added_successfully'));
    }


    public function destroy($id)
    {
        $admin = $this->adminRepo->findOne($id);

        if ($admin->img) {
            Storage::delete($admin->img);
        }

        $admin->delete();

        return \response()->json([
            'message' => __('models.deleted_successfully')
        ]);
    }

    public function profile()
    {
        $admin = Auth::user();
        return view('dashboard.profile' , compact('admin'));
    }

    public function updateProfile(AdminRequest $request)
    {
        $admin = Auth::user();

        $data = $request->except('password' , 'img' );

        if(request()->has('password') && $request->password != null){
            $request_data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('img')) {

            Storage::delete($admin->img);

            $data['img'] = $request->file('img')->store('admins');

        } else {
            $data['img'] = $admin->img;
        }

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

}
