<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Contracts\Repositories\ContentRepositoryInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\PageContentServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Http\Requests\MainPostRequest;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainPostController extends Controller
{
    /**
     * @var ContentRepositoryInterface
     */
    private $contentRepository;

    /**
     * @var RedirectServiceInterface
     */
    private $redirect;

    /**
     * @var LoggerServiceInterface
     */
    private $logger;

    /**
     * MainPostController constructor.
     * @param ContentRepositoryInterface $contentRepository
     * @param RedirectServiceInterface $redirect
     * @param LoggerServiceInterface $logger
     */
    function __construct(ContentRepositoryInterface $contentRepository, RedirectServiceInterface $redirect, LoggerServiceInterface $logger)
    {
        $this->contentRepository = $contentRepository;
        $this->redirect = $redirect;
        $this->logger = $logger;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function index()
    {
        try{
            $title = "Main Posts For Homepage";

            $mainPosts = $this->contentRepository->getAllMainPosts();

            return view('admin.mainPost.list',compact('title','mainPosts'));
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
        //
        abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        abort('404');
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
     * @param $id
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function edit($id)
    {
        try{
            $title = "Edit Main Post For Homepage";
            $mainPost = $this->contentRepository->getContentById('main-post',$id);

            return view('admin.mainPost.edit',compact('title','mainPost'));
        }
        catch(Exception $e){
            $this->logger->logException($e,'Admin Urgent');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MainPostRequest|Request $request
     * @param  int $id
     * @param PageContentServiceInterface $pageContent
     * @return \Illuminate\Http\Response
     * @throws Exception
     * @internal param SliderServiceInterface $sliderService
     */
    public function update(MainPostRequest $request, $id,PageContentServiceInterface $pageContent)
    {
        try{

            $pageContent->updateMainPostContent($id,$request->all(),$this->contentRepository);

            return $this->redirect->toMainPostsListPage();
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
        //
        abort('404');
    }
}
