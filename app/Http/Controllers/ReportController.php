<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest ;
use App\Jobs\UploadFileJob;
use App\Jobs\DeleteFileJob;
use App\Report;
use App\Group;
use App\User;
use Cviebrock\EloquentTaggable\Models\Tag;
use Auth;
use Debugbar;
use App\Traits\HasFile;


class ReportController extends Controller
{
  use HasFile;

  public function __construct()
   {
      $this->middleware('role:Writer')->only(['create','store']);
      $this->middleware('role:Delete')->only('destroy');
      $this->middleware('role:Editor')->only(['edit','update']);
   }

    public function index()
    {
       $reports = Report::orderBy('created_at', 'ASC')->with('tags','group')
                      ->filterReports()->paginate(15);
       $tags    = Tag::get() ;
       $groups  = Auth::user()->userGroups();
       return view('report.index',compact('tags','reports','groups'));
    }


    public function create()
    {
      $groups = Auth::user()->userGroups();
      return view('report.create',compact('groups'));
    }


    public function store(ReportRequest $request)
    {
       $report =  Auth::user()->cresteReport();
       $this->uploadFiles($request,$report);
       return redirect('report/'.$report->id);
    }


    public function show(Report $report)
    {
      $this->authorize('view',$report);
      return view('report.show',compact('report'));
    }

    public function list_reports()
    {
       return view('report.listOfReports');
    }


    public function edit(Report $report)
    {
      $groups = Group::get();
      return view('report.edit',compact('report','groups'));
    }


    public function update(ReportRequest $request, Report $report)
    {
      $report->updateReport();
      $this->uploadFiles($request,$report);
      return back();
    }


    public function destroy(Report $report)
    {
      DeleteFileJob::dispatch($report->getPathFiles());
      flash_if_success_or_fail($report->deleteReport());
      return redirect('report');
    }

    public function getReportByGroup(Group $group)
    {
      abort_if(! Auth::user()->hasGroup($group->id),403);
      $reports = $group->reports->load('tags')->paginate(15);
      return view('report.ListOfReports',compact('reports'));
    }

    public function getReportByTag($name)
    {
       $reports = Report::with('tags')
                  ->withAnyTags($name)
                  ->filterReports()
                  ->paginate(15);
       return view('report.ListOfReports',compact('reports'));
    }

}
