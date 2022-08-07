<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Contracts\BaseContract;
use app\Contracts\ProductContract;
use app\Contracts\OrderContract;
USE App\Contracts\CategoryContract;
use app\Contracts\AttributeContract;
use App\Contracts\BrandContract;
use App\Models\Brand;



class BrandsController extends Controller
{
    // protected $brandRepository;
    // public function __invoke(Request $request)
    // {
    //     //$brands = $this->brandRepository->listBrands();

    //    // $this->setPageTitle('Brands', 'List of all brands');
    //    $brands = Brand::all();
    //    return view('admin.brands.index', compact('brands'));
    // }

    // public function __construct(BrandContract $brandRepository)
    // {
    //     //parent::__construct($brandRepository);
    //     $this->brandRepository = $brandRepository;
        
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$brands = $this->brandRepository->listBrands();
        $brands = Brand::all();
       // $this->setPageTitle('Brands', 'List of all brands');
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
       // $this->setPageTitle('Brands', 'Create Brand');
        return view('admin.brands.create');
    }

    public function show(brand $brand, $id)
    {
        return view('admin.brands.show',compact('brands'));

    }
        /**
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         * @throws \Illuminate\Validation\ValidationException
         */
        public function store(Request $request)
            {
                $this->validate($request, [
                    'name'      =>  'required|max:191',
                    'image'     =>  'mimes:jpg,jpeg,png|max:1000'
                ]);

                $params = $request->except('_token');

                $brand = $this->brandRepository->createBrand($params);

                if (!$brand) {
                    return $this->responseRedirectBack('Error occurred while creating brand.', 'error', true, true);
                }
                return $this->responseRedirect('admin.brands.index', 'Brand added successfully' ,'success',false, false);
            }
            /**
                 * @param $id
                 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
                 */
                public function edit($id)
                    {
                        $brand = $this->brandRepository->findBrandById($id);

                     //   $this->setPageTitle('Brands', 'Edit Brand : '.$brand->name);
                        return view('admin.brands.edit', compact('brand'));
                    }
                /**
                 * @param Request $request
                 * @return \Illuminate\Http\RedirectResponse
                 * @throws \Illuminate\Validation\ValidationException
                 */
                public function update(Request $request)
                {
                    $this->validate($request, [
                        'name'      =>  'required|max:191',
                        'image'     =>  'mimes:jpg,jpeg,png|max:1000'
                    ]);

                    $params = $request->except('_token');

                    $brand = $this->brandRepository->updateBrand($params);

                    if (!$brand) {
                        return $this->responseRedirectBack('Error occurred while updating brand.', 'error', true, true);
                    }
                    return $this->responseRedirectBack('Brand updated successfully' ,'success',false, false);
                }

                     /**
                     * @param $id
                     * @return \Illuminate\Http\RedirectResponse
                     */
                    public function delete($id)
                    {
                        $brand = $this->brandRepository->deleteBrand($id);

                        if (!$brand) {
                            return $this->responseRedirectBack('Error occurred while deleting brand.', 'error', true, true);
                        }
                        return $this->responseRedirect('admin.brands.index', 'Brand deleted successfully' ,'success',false, false);
                    }

}
