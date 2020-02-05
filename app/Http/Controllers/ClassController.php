<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Class_time;
use Auth;
class ClassController extends Controller
{
    // subject preview and updates
    public function allSubjects()
    {
        $allSubjects = Subject::all();
        return view('subjects.allSubjects')->with('allSubjects',$allSubjects);
    }
    public function addSubjectForm()//display subject form for adding new one
    {
        return view('subjects.addSubject');
    }

    public function addSubject(Request $request)
    {
        $this->validate($request,[
            'subject_name' => 'required|string|unique:subjects',
        ]);

        $subject = new Subject;
        $subject->subject_name = $request['subject_name'];
        $subject->status = 1;
        $subject->created_by = Auth::user()->id;
        $subject->save();

        return redirect('/allSubjects')->withSuccessMessage('Subject Added Successfully');
    }

    public function editSubjectForm($id)
    {
        $subjectDetails = Subject::find($id);
        return view('subjects.editSubject')->with('subjectDetails',$subjectDetails);
    }

    public function editSubject(Request $request,$id)
    {
        $this->validate($request,[
            'subject_name' => 'required|string',
            'status'=>'required'
        ]);
        $subject = Subject::find($id);
        $subject->subject_name = $request['subject_name'];
        $subject->updated_by = Auth::user()->id;
        $subject->status = $request['status'];
        $subject->save();

        return redirect('/allSubjects')->withSuccessMessage('Subject Updated Successfully');
    }


    //class times preview and updates
    public function allClassTimes()
    {
        $allClassTimes = Class_time::all();
        return view('class_times.allClassTimes')->with('allClassTimes',$allClassTimes);
    }

    public function addClassTimeForm()//display class time form for adding new one
    {
        return view('class_times.addClassTime');
    }

    public function addClassTime(Request $request)
    {
        $this->validate($request,[
            'time_duration' => 'required|string|unique:class_times',
        ]);

        $class_time = new Class_time;
        $class_time->time_duration = $request['time_duration'];
        $class_time->status = 1;
        $class_time->created_by = Auth::user()->id;
        $class_time->save();

        return redirect('/allClassTimes')->withSuccessMessage('Class Time Added Successfully');
    }

        public function editclassTimeForm($id)
        {
            $class_time_details = Class_time::find($id);
            return view('class_times.editClassTime')->with('class_time_details',$class_time_details);
        }

        public function editclassTime(Request $request,$id)
        {
            $this->validate($request,[
                'time_duration' => 'required|string',
                'status'=>'required'
            ]);
            $class_time_details = Class_time::find($id);
            $class_time_details->time_duration = $request['time_duration'];
            $class_time_details->updated_by = Auth::user()->id;
            $class_time_details->status = $request['status'];
            $class_time_details->save();

            return redirect('/allClassTimes')->withSuccessMessage('Class Time Updated Successfully');
        }
}
