<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Repositories\Sql\PartnerRepository;
use App\Repositories\Sql\ServiceRepository;
use Illuminate\Support\Facades\Storage;


class PartnerController extends Controller
{
    protected $partnerRepo , $serviceRepo;

    public function __construct(PartnerRepository $partnerRepo , ServiceRepository $serviceRepo)
    {
         $this->partnerRepo = $partnerRepo ;
         $this->serviceRepo = $serviceRepo ;
    }

    public function index()
    {
         $partners = $this->partnerRepo->getAll();
         return view('dashboard.backend.partners.index' , compact('partners'));
    }


    public function create()
    {
         $services = $this->serviceRepo->getAll();
         return view('dashboard.backend.partners.create' , compact('services'));
    }


    public function store(PartnerRequest $request)
    {

        $data = $request->except('password' , 'img' , 'location_img');

        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('partners');
        }

        if ($request->hasFile('location_img')) {
            $data['location_img'] = $request->file('location_img')->store('partners');
        }

        $partner = $this->partnerRepo->create($data);
        $partner->services()->Sync($request->service_id);

      return redirect(route('admin.partners.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        $partner = $this->partnerRepo->findOne($id);
        return view('dashboard.backend.partners.show' , compact('partner') );

    }


    public function edit($id)
    {

         $services = $this->serviceRepo->getAll();
         $partner = $this->partnerRepo->findOne($id);
         return view('dashboard.backend.partners.edit' , compact('partner' , 'services'));
    }


    public function update(PartnerRequest $request, $id)
    {
        $partner = $this->partnerRepo->findOne($id);
        $data = $request->except(['password' , 'img' , 'location_img']);

        if(request()->has('password') && $request->password != null){
            $request_data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('img')) {

            Storage::delete($partner->img);

            $data['img'] = $request->file('img')->store('partners');

        } else {
            $data['img'] = $partner->img;
        }


        if ($request->hasFile('location_img')) {

            Storage::delete($partner->location_img);

            $data['location_img'] = $request->file('location_img')->store('partners');

        } else {
            $data['location_img'] = $partner->location_img;
        }

        $parnerUpdate = $partner->update($data);

        $partner->services()->sync($request->service_id);


      return redirect(route('admin.partners.index'))->with('success', __('models.added_successfully'));

    }


    public function destroy($id)
    {

        $partner = $this->partnerRepo->findOne($id);

        if ($partner->img) {
            Storage::delete($partner->img);
        }

        if ($partner->location_img) {
            Storage::delete($partner->location_img);
        }

        $partner->delete();

        return \response()->json([
            'message' => __('models.deleted_successfully')
        ]);
    }
}
