<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Contracts\Repositories\ContentRepositoryInterface;
use App\Contracts\Repositories\IconRepositoryInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Http\Requests\BuiltInFeaturesRequest;
use App\Services\PageContentService;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BuiltInFeaturesController extends Controller
{
    private $pageContentService;

    private $iconRepository;

    private $contentRepository;

    private $logger;

    private $redirect;

    /**
     * BuiltInFeaturesController constructor.
     * @param PageContentService $pageContentService
     * @param IconRepositoryInterface $iconRepo
     * @param ContentRepositoryInterface $contentRepo
     * @param LoggerServiceInterface $logger
     * @param RedirectServiceInterface $redirect
     */
    function __construct(PageContentService $pageContentService,IconRepositoryInterface $iconRepo, ContentRepositoryInterface $contentRepo, LoggerServiceInterface $logger,RedirectServiceInterface $redirect)
    {
        $this->pageContentService = $pageContentService;
        $this->iconRepository = $iconRepo;
        $this->contentRepository = $contentRepo;
        $this->logger = $logger;
        $this->redirect = $redirect;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $title = 'List of Built In Features';
            $features = $this->pageContentService->getAllBuiltInFeaturePosts($this->contentRepository);
            return view('admin.builtInFeatures.list',compact('features','title'));
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
        try{
            $title = 'Create New Built In Features article';
            $iconsCollection = $this->pageContentService->getAllIcons($this->iconRepository);

            $icons = $this->getIconsArray($iconsCollection);

            return view('admin.builtInFeatures.create',compact('title','icons'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BuiltInFeaturesRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuiltInFeaturesRequest $request)
    {
        try{
            $this->pageContentService->createBuiltInFeaturePost($request->all(),$this->contentRepository);
            return $this->redirect->toBuiltInFeaturesPostsListPage('successMessage','builtInFeatures.created');
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $builtInFeature = $this->pageContentService->getBuiltInFeaturePostByID($id,$this->contentRepository);

            $title = 'Edit Built In Features article';

            $iconsCollection = $this->pageContentService->getAllIcons($this->iconRepository);

            $icons = $this->getIconsArray($iconsCollection);

            return view('admin.builtInFeatures.edit',compact('builtInFeature','title','icons'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param BuiltInFeaturesRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BuiltInFeaturesRequest $request, $id)
    {
        try{
            $this->pageContentService->updateBuiltInFeaturePostByID($id,$request->all(),$this->contentRepository);
            return $this->redirect->toBuiltInFeaturesPostsListPage('successMessage','builtInFeatures.updated');
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        var_dump($id);
        try{
            $isDeleted = $this->pageContentService->deleteBuiltInFeaturePostByID($id,$this->contentRepository);
            if($isDeleted){
               return $this->redirect->toBuiltInFeaturesPostsListPage('successMessage','builtInFeatures.deleted');
            }
            else{
                return $this->redirect->toBuiltInFeaturesPostsListPage('failureMessage','builtInFeatures.error');
            }
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * @param $iconsCollection
     * @return array
     */
    protected function getIconsArray($iconsCollection)
    {
        $icons = array();

        foreach ($iconsCollection as $icon) {
            $icons[$icon->id] = $icon->name;
        }

        return $icons;
    }
}
