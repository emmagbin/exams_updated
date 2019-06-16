<?php
/**
 * Created by PhpStorm.
 * User: ima
 * Date: 6/15/2019
 * Time: 12:26 AM
 */namespace App\Http\Controllers;
use \App;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\QuizCategory;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
use Image;
use ImageSettings;
use File;
class PerformanceController extends Controller
{
    //
    public function index(){
        if(!checkRole(getUserGrade(2)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $data['active_class']       = 'performance';
        $data['title']              = getPhrase('student_performance');


        $view_name = getTheme().'::performance.student.list';
        return view($view_name, $data);
    }

    public function getDatatable()
    {

        if(!checkRole(getUserGrade(2)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $records = App\QuizResult::join('users', 'quizresults.user_id', '=', 'users.id')->select([
            'quizresults.created_at','quiz_id', 'user_id', 'marks_obtained','negative_marks', 'total_marks','percentage','exam_status','users.slug as slug'])
            ->orderBy('quizresults.updated_at', 'desc')->get();

        return Datatables::of($records)
            ->editColumn('quiz_id', function($records){
                return App\Quiz::find($records->quiz_id)->title;
            })
            ->editColumn('user_id', function($records){
                return '<a href="'.URL_USER_DETAILS.$records->slug.'">'.ucfirst(App\User::find($records->user_id)->name).'</a>';

            })
            ->editColumn('negative_marks', function($records){
                return round($records->negative_marks);
            })
            ->editColumn('percentage', function($records){
                return $records->percentage . "%";
            })
            ->editColumn('exam_status', function($records){
                if($records->exam_status == 'pass'){
                    return   '<i class="fa fa-check text-success" title="'.getPhrase('enable').'">'.$records->exam_status.'</i>';
                }elseif ($records->exam_status == 'fail'){
                    return   '<i class="fa fa-check text-danger" title="'.getPhrase('disable').'">'.$records->exam_status.'</i>';
                }

            })
            ->make();
    }

}