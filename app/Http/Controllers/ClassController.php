<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Class_time;
use App\Routine;
use App\User;
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
        $class_time->start_time = $request['start_time'];
        $class_time->end_time = $request['end_time'];
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


        // class routine area
        public function allClass()
        {
            $allClasses= Routine::all();
            return view('classes_in_routine.allClasses')->with('allClasses',$allClasses);
        }

        public function addClassForm()//display class form for adding new one
        {
            $data = array(
                'subjects' => Subject::all(),
                'class_times' => Class_time::all(),
                'teachers' => User::where('user_role','1')->get(),
            );
            return view('classes_in_routine.addClass')->with($data);
        }

        public function addClass(Request $request)
        {
            $this->validate($request,[
                'subject' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'teacher_id' => 'required',
                'room_no' => 'required|numeric',
                'status' => 'required',
            ]);

            $check_routine = Routine::where('subject_id',$request['subject'])
                            ->where('start_time',$request['start_time'])
                            ->where('end_time',$request['end_time'])
                            ->count();
            if ($check_routine > 0) {
                return redirect()->back()->withErrorMessage('Duplicate Classes cannot be added for same date and time.');
            }else {
                $class = new Routine;
                $class->subject_id = $request['subject'];
                $class->start_time = $request['start_time'];
                $class->end_time = $request['end_time'];
                $class->room_no = $request['room_no'];
                $class->teacher_id = $request['teacher_id'];
                $class->status = 1;
                $class->created_by = Auth::user()->id;
                $class->save();

                return redirect('/allClasses')->withSuccessMessage('Class Time Added Successfully');
            }
        }

        public function editclassForm($id)
        {
            $data = array(
                'class_details' => Routine::find($id),
                'teachers' => User::where('user_role','1')->get(),
            );
            return view('classes_in_routine.editClass')->with($data);

        }

        public function editclass(Request $request,$id)
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
