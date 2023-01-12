<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Repositories\Sql\ServiceRepository;


class ServiceController extends Controller
{
    protected $serviceRepo ;
    
    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo ;

    }

    public function index()
    {
        $services = $this->serviceRepo->getAll();
         return view('dashboard.backend.services.index' , compact('services'));
    }


    public function create()
    {
         return view('dashboard.backend.services.create');
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->all();


        $this->serviceRepo->create($data);


      return redirect(route('admin.services.index'))->with('success', __('models.added_successfully'));

    }


    public function edit($id)
    {

        $service = $this->serviceRepo->findOne($id);
        return view('dashboard.backend.services.edit' , compact('service'));

    }


    public function update(ServiceRequest $request, $id)
    {
        $service = $this->serviceRepo->findOne($id);
        $data = $request->all();

        $service->update($data);

      return redirect(route('admin.services.index'))->with('success', __('models.added_successfully'));

    }


    public function destroy($id)
    {
        $service = $this->serviceRepo->findOne($id);


        $service->delete();

         return \response()->json([
            'message' => __('models.deleted_successfully')
        ]);
    }
}
