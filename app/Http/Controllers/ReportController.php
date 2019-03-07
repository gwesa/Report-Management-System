<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest ;

use App\Jobs\UploadFileJob;
use App\Report;
use App\Group;
use App\User;
use Cviebrock\EloquentTaggable\Models\Tag;
use Auth;
use Debugbar;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $reports = Report::orderBy('created_at', 'ASC')->with('tags','group')
                      ->filterReports()->paginate(15);
       $tags    = Tag::get() ;
       $groups  = Auth::user()->userGroups();

       return view('report.index',compact('tags','reports','groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $groups = Group::get();
      return view('report.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
       $report =  Auth::user()->cresteReport();
       UploadFileJob::dispatch($request->file('files'),$report);
       flash_success('تم إضافة االتقرير بنجاح، عند إكتمال رفع الملفات سيتم إشعار على البريد الالكتروني');
       return redirect('report/'.$report->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
      $this->authorize('view',$report);
      return view('report.show',compact('report'));
    }

    public function list_reports()
    {
       return view('report.listOfReports');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
      $groups = Group::get();
      return view('report.edit',compact('report','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(ReportRequest $request, Report $report)
    {
      $report->updateReport();
      $request->hasfile('files') ? $this->uploadFiles(request('files'),$report)
                                 : flash_success('تم التعديل بنجاح ');
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->detag();
        flash_if_success_or_fail($report->delete());
        return redirect('report');
    }

    public function reportByGroup(Group $group)
    {
      abort_if(! Auth::user()->hasGroup($group->id),403);
      $reports = $group->reports->load('tags')->paginate(15);
      return view('report.ListOfReports',compact('reports'));
    }

    public function reportByTag($name)
    {
       $reports = Report::with('tags')
                  ->withAnyTags($name)
                  ->filterReports()
                  ->paginate(15);
       return view('report.ListOfReports',compact('reports'));
    }

    public function uploadFiles($files,$report)
    {
      UploadFileJob::dispatch($files,$report);
      return flash_success('تم التعديل بنجاح، عند اكتمال رفع الملفات سيتم ااشعارك على البريد الالكتروني ');
    }
}
