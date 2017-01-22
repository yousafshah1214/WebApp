<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ContentRepositoryInterface;
use App\Contracts\Repositories\ImageRepositoryInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\PageContentServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Http\Requests\Admin\SampleWebsiteRequest;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SampleWebsiteController extends Controller
{
    private $pageContentService;

    private $contentRepository;

    private $redirect;

    private $logger;

    function __construct(PageContentServiceInterface $pageContentService,ContentRepositoryInterface $contentRepo, LoggerServiceInterface $loggerService, RedirectServiceInterface $redirectService)
    {
        $this->pageContentService = $pageContentService;
        $this->contentRepository = $contentRepo;
        $this->logger = $loggerService;
        $this->redirect = $redirectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $title = "List of Sample Websites";
            $sampleWebsites = $this->pageContentService->getAllSampleWebsitePosts($this->contentRepository);

            return view('admin.sampleWebsites.list',compact('title','sampleWebsites'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin urgent');
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
            $title = "Create New Website Sample";
            $submitButtonText = "Create New Website Sample";
            return view('admin.sampleWebsites.create',compact('title','submitButtonText'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SampleWebsiteRequest|Request $request
     * @param ImageRepositoryInterface $imageRepo
     * @return \Illuminate\Http\Response
     */
    public function store(SampleWebsiteRequest $request,ImageRepositoryInterface $imageRepo)
    {
        try {
            $this->pageContentService->createSampleWebsitePost($request->all(),$this->contentRepository,$imageRepo);
            return $this->redirect->toSampleWebsitePostsListPage('successMessage','sampleWebsites.created');
        } catch (Exception $e) {
            $this->logger->logException($e, 'Admin urgent');
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
        abort('404');
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
            $title = "Edit Sample Website Post";
            $sampleWebsite = $this->pageContentService->getSampleWebsitePostByID($id,$this->contentRepository);

            return view('admin.sampleWebsites.edit',compact('title','sampleWebsite'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin urgent');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SampleWebsiteRequest|Request $request
     * @param  int $id
     * @param ImageRepositoryInterface $imageRepo
     * @return \Illuminate\Http\Response
     */
    public function update(SampleWebsiteRequest $request, $id,ImageRepositoryInterface $imageRepo)
    {
        try{
            $this->pageContentService->updateSampleWebsitePostByID($id,$request->all(),$this->contentRepository,$imageRepo);
            return $this->redirect->toSampleWebsitePostsListPage('successMessage','sampleWebsites.updated');

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
        try{
            $isDeleted = $this->pageContentService->deleteSampleWebsitePostByID($id,$this->contentRepository);
            if($isDeleted){
                return $this->redirect->toSampleWebsitePostsListPage('successMessage','sampleWebsites.deleted');
            }
            else{
                return $this->redirect->toSampleWebsitePostsListPage('errorMessage','sampleWebsites.error');
            }
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }
}
