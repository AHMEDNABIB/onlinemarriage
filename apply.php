<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function choiceForm(Request $request){
        if(!isset($request->A) && !isset($request->B) && !isset($request->C)) {
            return redirect()->back()->with('error_msg', "আপনার পছন্দকৃত ইউনিট সিলেক্ট করুন!");
        } else {
            $applied_unit = [];
            $new_depts = [];
            if(isset($request->A) && $request->A == 'check') {
                array_push($applied_unit, 'A');
                foreach(session()->get('unit_data')['A']['depts'] as $unit) {
                    array_push($new_depts, ['id'=> $unit->id, 'name'=>$unit->bname]);
                }
            }
            if(isset($request->B) && $request->B == 'check') {
                array_push($applied_unit, 'B');
                foreach(session()->get('unit_data')['B']['depts']  as $unit) {
                    array_push($new_depts, ['id'=> $unit->id, 'name'=>$unit->bname]);
                }
            }
            if(isset($request->C) && $request->C == 'check') {
                array_push($applied_unit, 'C');
                foreach(session()->get('unit_data')['C']['depts'] as $unit) {
                    array_push($new_depts, ['id'=> $unit->id, 'name'=>$unit->bname]);
                }
            }
            //return $new_depts;

            $sub_choice = [];
            $quota = [];
            $application_info = DB::table('applications')->where('gst_app_id', session()->get('gst_app_id'))->first();
            if(!empty($application_info)) {
                $choice_list = json_decode($application_info->sub_choice);
                foreach($choice_list as $choice) {
                    foreach($new_depts as $key => $depts) {
                        if($depts['id'] == $choice) {
                            array_push($sub_choice, $depts);
                            unset($new_depts[$key]);
                            break;
                        }
                    }
                }
                $quota = $application_info->quota?explode(",",$application_info->quota):[];
            }

            $new_depts = array_slice($new_depts, 0, count($new_depts));

            $sub_choice = array_merge($sub_choice, $new_depts);

            //return $quota;
            return view('student.subChoiceForm', compact('applied_unit','sub_choice', 'new_depts','quota'));
        }
    }

    // public function apply(Request $request)
    // {
    //     $bill_amount = 0;
    //     $per_unit_bill = env('application_fee');
    //     $application_data = [
    //         'a_unit' => 0,
    //         'b_unit' => 0,
    //         'c_unit' => 0,
    //     ];
    //     $sub_choice = [];

    //     foreach($request->choiceSubs as $subject) {
    //         array_push($sub_choice, $subject['id']);
    //     }

    //     $application_data['sub_choice'] = json_encode($sub_choice);

    //     foreach($request->units as $unit) {
    //         if($unit=='A') {
    //             $application_data['a_unit'] = 1;
    //             $bill_amount += $per_unit_bill;
    //         } elseif($unit=='B') {
    //             $application_data['b_unit'] = 1;
    //             $bill_amount += $per_unit_bill;
    //         } elseif($unit=='C') {
    //             $application_data['c_unit'] = 1;
    //             $bill_amount += $per_unit_bill;
    //         }
    //     }
    //     $application_data['quota'] = implode(",", $request->quota);

    //     $application_info = DB::table('applications')->where('gst_app_id', session()->get('gst_app_id'))->first();

    //     if(!empty($application_info)) {
    //         $application_data['latest_download'] = 1;
    //         $application_data['updated_at'] = now();

    //         $bill_info = DB::table('application_bills')->where('gst_app_id', session()->get('gst_app_id'))->get();

    //         $bill_not_found=true;
    //         $bill_paid=true;
    //         $bill_data = [
    //             'amount' => $bill_amount,
    //             'a_unit' => $application_data['a_unit']?1:0,
    //             'b_unit' => $application_data['b_unit']?1:0,
    //             'c_unit' => $application_data['c_unit']?1:0,
    //             'updated_at' => now(),
    //         ];

    //         foreach($bill_info as $bill) {
    //             if($bill->pay_status == 'pending') {
    //                 if($bill_data['amount']==0) {
    //                     DB::table('application_bills')->where('id', $bill->id)->delete();
    //                 } else {
    //                     DB::table('application_bills')->where('id', $bill->id)->update($bill_data);
    //                 }
    //                 $bill_not_found=false;
    //                 $bill_paid=false;
    //             } else {
    //                 $bill_data['amount'] -= $bill->amount;
    //                 if($bill->a_unit) $bill_data['a_unit']=0;
    //                 if($bill->b_unit) $bill_data['b_unit']=0;
    //                 if($bill->c_unit) $bill_data['c_unit']=0;
    //             }
    //         }

    //         if($bill_not_found && $bill_data['amount']>0) {
    //             $bill_data['id'] = session()->get('gst_app_id')."0".count($bill_info)+1;
    //             $bill_data['gst_app_id'] = session()->get('gst_app_id');
    //             $bill_data['applications_id'] = $application_info->id;
    //             $bill_data['created_at'] = now();
    //             $bill_data['updated_at'] = now();
    //             DB::table('application_bills')->where('id', $bill->id)->insert($bill_data);

    //             $bill_paid=false;
    //         }

    //         if($bill_paid) {
    //             $application_data['final_sub_choice']=$application_data['sub_choice'];
    //         }

    //         DB::table('applications')->where('gst_app_id', session()->get('gst_app_id'))->update($application_data);


    //     } else {
    //         $application_data['gst_app_id'] = session()->get('gst_app_id');
    //         $application_data['created_at'] = now();
    //         $application_data['updated_at'] = now();
    //         $application_id = DB::table('applications')->insertGetId($application_data);
    //         DB::table('application_bills')->insert([
    //             'id' => session()->get('gst_app_id')."01",
    //             'gst_app_id' => session()->get('gst_app_id'),
    //             'applications_id' => $application_id,
    //             'amount' => $bill_amount,
    //             'a_unit' => $application_data['a_unit'],
    //             'b_unit' => $application_data['b_unit'],
    //             'c_unit' => $application_data['c_unit'],
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     return response()->json(['status' => 'success']);
    // }

    public function apply(Request $request)
    {
        $application_data = [
            'a_unit' => 0,
            'b_unit' => 0,
            'c_unit' => 0,
        ];
        $sub_choice = [];

        foreach($request->choiceSubs as $subject) {
            array_push($sub_choice, $subject['id']);
        }

        $application_data['sub_choice'] = json_encode($sub_choice);

        foreach($request->units as $unit) {
            if($unit=='A') {
                $application_data['a_unit'] = 1;
            } elseif($unit=='B') {
                $application_data['b_unit'] = 1;
            } elseif($unit=='C') {
                $application_data['c_unit'] = 1;
            }
        }
        $application_data['quota'] = implode(",", $request->quota);

        $application_info = DB::table('applications')->where('gst_app_id', session()->get('gst_app_id'))->first();

        if(!empty($application_info)) {
            $application_data['latest_download'] = 1;
            $application_data['updated_at'] = now();

            DB::table('applications')->where('gst_app_id', session()->get('gst_app_id'))->update($application_data);
        } else {
            $application_data['gst_app_id'] = session()->get('gst_app_id');
            $application_data['gst_unit'] = session()->get('gst_unit');
            $application_data['pay_status'] = 'pending';
            $application_data['created_at'] = now();
            $application_data['updated_at'] = now();
            DB::table('applications')->insertGetId($application_data);
        }

        return response()->json(['status' => 'success']);
    }

    public function choiceList()
    {
        $application_info = DB::table('applications')->where('gst_app_id', session()->get('gst_app_id'))->first();

        if(!empty($application_info)) {
            $depts = DB::table('departments')->select('id','bname')->orderBy('id')->get()->keyBy('id');
            $sub_choice_info = [];
            foreach (json_decode($application_info->sub_choice) as $choice) {
                array_push($sub_choice_info, $depts[$choice]);
            }
            return view('student.checkChoiceList', compact('sub_choice_info','application_info'));
        } else {
            return redirect()->back();
        }
    }
}
