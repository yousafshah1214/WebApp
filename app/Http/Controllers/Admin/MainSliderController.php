<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Contracts\Services\SliderServiceInterface;
use App\Http\Requests\Admin\MainSliderRequest;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainSliderController extends Controller
{
    /**
     * @var LoggerServiceInterface
     */
    private $logger;

    /**
     * @var RedirectServiceInterface
     */
    private $redirect;

    /**
     * MainSliderController constructor.
     * @param LoggerServiceInterface $loggerService
     * @param RedirectServiceInterface $redirect
     */
    function __construct(LoggerServiceInterface $loggerService, RedirectServiceInterface $redirect)
    {
        $this->logger = $loggerService;
        $this->redirect = $redirect;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'All Main Sliders';

        return view('admin.mainSlider.list',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Main Slider';
        return view('admin.mainSlider.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MainSliderRequest|Request $request
     * @param SliderServiceInterface $sliderService
     * @param SliderRepositoryInterface $sliderRepository
     * @return \Illuminate\Http\Response
     */
    public function store(MainSliderRequest $request, SliderServiceInterface $sliderService, SliderRepositoryInterface $sliderRepository)
    {
        // validated request
        try{
            $sliderService->createMainSlider($request->all(),$sliderRepository);

            return $this->redirect->toMainSlidersListPage("successMessage","slider.created");

        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
