@extends('layouts.admin.adminlayout')
@section('header_scripts')
    <link href="{{CSS}}ajax-datatables.css" rel="stylesheet">
@stop
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="{{PREFIX}}"><i class="mdi mdi-home"></i></a> </li>
                        <li>{{ $title }}</li>
                    </ol>
                </div>
            </div>

            <!-- /.row -->
            <div class="panel panel-custom">
                <div class="panel-heading">

                    <h1>{{ $title }}</h1>
                </div>
                <div class="panel-body packages">
                    <div>
                        <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>{{ getPhrase('test_date')}}</th>
                                <th>{{ getPhrase('quiztitle')}}</th>
                                <th>{{ getPhrase('user')}}</th>
                                <th>{{ getPhrase('marks_obtained')}}</th>
                                <th>{{ getPhrase('negative_marks')}}</th>
                                <th>{{ getPhrase('total_marks')}}</th>
                                <th>{{ getPhrase('percentage')}}</th>
                                <th>{{ getPhrase('exam_status')}}</th>

                            </tr>
                            </thead>

                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection


@section('footer_scripts')

    @include('common.datatables', array('route'=>'student_performance.dataTable'))
    {{--@include('common.deletescript', array('route'=>URL_QUIZ_CATEGORY_DELETE))--}}

@stop
