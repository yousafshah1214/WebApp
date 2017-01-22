<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Contracts\Services\SliderServiceInterface;
use App\Http\Requests\Admin\MainSliderRequest;
use App\Slider;
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
     * @var string
     */
    private $sliderType;

    /**
     * MainSliderController constructor.
     * @param LoggerServiceInterface $loggerService
     * @param RedirectServiceInterface $redirect
     */
    function __construct(LoggerServiceInterface $loggerService, RedirectServiceInterface $redirect)
    {
        $this->logger = $loggerService;
        $this->redirect = $redirect;
        $this->sliderType = 'main-slider';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $title = 'All Main Sliders';
            $mainSliders = Slider::where('type','=','main-slider')->get();

            return view('admin.mainSlider.list',compact('title','mainSliders'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        try {

            $title = 'Create New Main Slider';
            return view('admin.mainSlider.create', compact('title'));

        } catch (Exception $e) {

            $this->logger->logException($e, 'Admin Urgent');

        }
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

            $sliderService->createSlider($this->sliderType,$request->all(),$sliderRepository);

            return $this->redirect->toMainSlidersListPage("successMessage","slider.created");

        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param SliderServiceInterface $sliderService
     * @param SliderRepositoryInterface $sliderRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id,SliderServiceInterface $sliderService, SliderRepositoryInterface $sliderRepository)
    {
        try{
            $title = 'Edit Main Slider';
            $slider =  $sliderService->getSliderById($this->sliderType,$id,$sliderRepository);
            return view('admin.mainSlider.edit',compact('slider','title'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Developer Urgent');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MainSliderRequest|Request $request
     * @param  int $id
     * @param SliderServiceInterface $sliderService
     * @param SliderRepositoryInterface $sliderRepository
     * @return \Illuminate\Http\Response
     */
    public function update(MainSliderRequest $request, $id,SliderServiceInterface $sliderService, SliderRepositoryInterface $sliderRepository)
    {
        try{
            $sliderService->updateSlider($this->sliderType,$id,$request->all(),$sliderRepository);

            return $this->redirect->toMainSlidersListPage("successMessage","slider.edited");

        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param SliderServiceInterface $sliderService
     * @param SliderRepositoryInterface $sliderRepository
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,SliderServiceInterface $sliderService, SliderRepositoryInterface $sliderRepository)
    {
        try{
            $sliderService->deleteSlider($this->sliderType,$id,$sliderRepository);

            return $this->redirect->toMainSlidersListPage("successMessage","slider.deleted");
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }
}
