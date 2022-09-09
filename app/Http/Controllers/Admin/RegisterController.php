<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class RegisterController extends Controller
{
    public function physicalindex(){
        return view('admin.register.physical');
    }

    public function physicaldataTable(Request $request){
        if($request->ajax()) {
            $datas = \App\Models\PhysicalAttendance::select('*');
            return DataTables::of($datas)
            ->addColumn('action', function($row){  
                $btn = '
                       
                        <button  type="button" data-toggle="tooltip"  data-original-title="Detail" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'"  class="btn btn-primary  btn-xs  me-1" >Detail</i></button>
                            <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$row->id.'" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel'.$row->id.'">Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped w-100">
                                            <tr>
                                                <td style="width:150px;"  >Photo</td>
                                                <td style="width:5px;">:</td>
                                                <td>
                                                    <div class="register-img">
                                                        <img src="'.asset('images/register/'.$row->Photo).'"  class="img-thumbnail" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Country Organization</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->country_organization.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Country Organization Other</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->country_organization_other.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Title</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->title.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Family Name</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->family_name.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>First Name</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->first_name.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Prefered name on badge</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->prefered_name_on_badge.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nationality</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->nationality.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nationality other</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->nationality_other.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Position</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->position.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Position Other</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->position_other.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Affiliation</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->affiliation.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Official title</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->office_address.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Office Address</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->affiliation.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->gender.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->email.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Telephone</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->telephone.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>fax</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->fax.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Passport NO</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->passport_no.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date of Issuance</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->date_of_issuance.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date of expiry</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->date_of_expiry.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Flight Number</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->flight_number.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Flight Date</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->flight_date.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Flight Time</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->flight_time.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Departure flight number</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->departure_flight_number.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Departure flight Date</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->departure_flight_date.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Departure flight Time</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->departure_flight_time.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Special dietary requirement</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->special_dietary_requirement.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Special Dietary Requirement Other</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->special_dietary_requirement_Other.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Special Dietary Requirement Other</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->special_dietary_requirement_Other.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other Dietary Restriction</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->other_dietary_restriction.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Food Allergy</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->food_allergy.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Body measurement</td>
                                                <td>:</td>
                                                <td>
                                                    '.$row->body_measurement.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Diplomatic Note</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="register-img">
                                                        <img src="'.asset('images/register/'.$row->diplomatic_note).'"  class="img-thumbnail" >
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>       
                        ';
                return $btn;
            })
            ->addColumn('name', function($row){ 
                return $row->family_name.' '.$row->first_name;
            })
            ->editColumn('nationality', function($row) {
                return !empty($row->nationality)?$row->nationality:$row->nationality_other;
            })
            ->rawColumns(['action','name'])   //merender content column dalam bentuk html
            ->escapeColumns()  //mencegah XSS Attack
            ->order(function ($query) {
                $query->orderBy('id', 'DESC');
            })
            ->toJson(); 
        }

        }

        public function physicalindexexcel(){
            //$table=(new \App\Models\PhysicalAttendance)->getTableColumns();
            $table=collect(\App\Models\PhysicalAttendance::first())->keys();
            //dd($table);

            $thead='';
            foreach($table as $r ){

                if(($r !='updated_at') && ($r !='bdf_id') && ($r !='id') && ($r !='agree')  ){
                    $name=$r;
                    $thead.='<td>'.ucwords(str_replace('_',' ',$name)).'</td>';
                }
            }


            $data=\App\Models\PhysicalAttendance::orderBy('id','DESC')->get();
            
            $rowHTML='';
            foreach($data as $row){
                $rowHTML .='
                    <tr>
                       
                        <td>
                           '.$row->country_organization.'
                        </td>
                        <td>
                           '.$row->country_organization_other.'
                        </td>
                        <td>
                           '.$row->title.'
                        </td>
                        <td>
                           '.$row->family_name.'
                        </td>
                        <td>
                           '.$row->first_name.'
                        </td>
                        <td>
                           '.$row->prefered_name_on_badge.'
                        </td>
                        <td>
                           '.$row->nationality.'
                        </td>
                        <td>
                           '.$row->nationality_other.'
                        </td>
                        <td>
                           '.$row->affiliation.'
                        </td>
                        <td>
                           '.$row->official_title.'
                        </td>
                        <td>
                            '.$row->gender.'
                        </td>
                        <td>
                           '.$row->official_title.'
                        </td>
                      
                        <td>
                           '.$row->office_address.'
                        </td>
                       
                        <td>
                           '.$row->gender.'
                        </td>
                        <td>
                           '.$row->email.'
                        </td>
                        <td>
                            \''.$row->telephone.'\'
                        </td>
                        <td>
                           \''.$row->fax.'\'
                        </td>
                       
                        <td>
                           '.$row->passport_no.'
                        </td>
                      
                        <td>
                           '.$row->date_of_issuance.'
                        </td>
                        
                        <td>
                           '.$row->date_of_expiry.'
                        </td>
                       
                        <td>
                           '.$row->flight_number.'
                        </td>
                       
                        <td>
                           '.$row->flight_date.'
                        </td>
                        
                        <td>
                           '.$row->flight_time.'
                        </td>
                       
                        <td>
                           '.$row->departure_flight_number.'
                        </td>
                        <td>
                           '.$row->departure_flight_date.'
                        </td>
                        <td>
                           '.$row->departure_flight_time.'
                        </td>
                        <td>
                           '.$row->special_dietary_requirement.'
                        </td>
                        <td>
                           '.$row->special_dietary_requirement_Other.'
                        </td>
                        <td>
                           '.$row->other_dietary_restriction.'
                        </td>
                        <td>
                           '.$row->food_allergy.'
                        </td>
                        <td>
                           '.$row->other_food_allergy.'
                        </td>
                        <td>
                           '.$row->body_measurement.'
                        </td>
                        <td>
                            <a href="'.asset('images/register/'.$row->Photo).'" target="_blank"> '.asset('images/register/'.$row->Photo).'</a>
                        </td>
                        <td>
                            <a href="'.asset('images/register/'.$row->diplomatic_note).'" target="_blank"> '.asset('images/register/'.$row->diplomatic_note).'</a>
                        </td>
                        <td>
                            '.$row->created_at.'
                     </td>
                    </tr>
                    ';
            }
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Data Register Physical Attendance_".date('Ymdhis').".xls");

              echo $html='
                    <table border="1">
                        <thead>
                            '.$thead.'
                        <thead>
                        <tbody>
                            '.$rowHTML.'
                        </tbody>
                    </table>
                ';



        }


        public function virtualindex(){
            return view('admin.register.virtual');
        }

        public function virtualdataTable(Request $request){
            if($request->ajax()) {
                $datas = \App\Models\VirtualAttendance::select('*');
                return DataTables::of($datas)
                ->addColumn('action', function($row){  
                    $btn = '
                           
                            <button  type="button" data-toggle="tooltip"  data-original-title="Detail" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'"  class="btn btn-primary  btn-xs  me-1" >Detail</i></button>
                                <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$row->id.'" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel'.$row->id.'">Detail</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped w-100">
                                                
                                                <tr>
                                                    <td>Country Organization</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->country_organization.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Country Organization Other</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->country_organization_other.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Title</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->title.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Family Name</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->family_name.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->first_name.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Prefered name on badge</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->prefered_name_on_badge.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nationality</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->nationality.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nationality other</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->nationality_other.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Position</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->position.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Position Other</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->position_other.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Affiliation</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->affiliation.'
                                                    </td>
                                                </tr>
                                               
                                                
                                                <tr>
                                                    <td>Email</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->email.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Telephone</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->telephone.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>fax</td>
                                                    <td>:</td>
                                                    <td>
                                                        '.$row->fax.'
                                                    </td>
                                                </tr>
                                                
                                               
    
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>       
                            ';
                    return $btn;
                })
                ->addColumn('name', function($row){ 
                    return $row->family_name.' '.$row->first_name;
                })
                ->editColumn('nationality', function($row) {
                    return !empty($row->nationality)?$row->nationality:$row->nationality_other;
                })
                ->rawColumns(['action','name'])   //merender content column dalam bentuk html
                ->escapeColumns()  //mencegah XSS Attack
                ->order(function ($query) {
                    $query->orderBy('id', 'DESC');
                })
                ->toJson(); 
            }

        }


        public function virtualexcel(){
            $data=\App\Models\VirtualAttendance::orderBy('id','DESC')->get();
            //dd($data);
            $rowHTML='';
            foreach($data as $row){
                $rowHTML.='
                            <tr>
                                <td>'.$row->country_organization.'</td>
                                <td>'.$row->country_organization_other.'</td>
                                <td>'.$row->title.'</td>
                                <td>'.$row->family_name.'</td>
                                <td>'.$row->first_name.'</td>
                                <td>'.$row->prefered_name_on_badge.'</td>
                                <td>'.$row->nationality.'</td>
                                <td>'.$row->nationality_other.'</td>
                                <td>'.$row->position.'</td>
                                <td>'.$row->position_other.'</td>
                                <td>'.$row->affiliation.'</td>
                                <td>'.$row->email.'</td>
                                <td>'.$row->telephone.'</td>
                                <td>'.$row->fax.'</td>
                                <td>'.$row->created_at.'</td>
                            </tr>
                        ';


            }
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Data Register Virtual Attendance_".date('Ymdhis').".xls");
            echo $html='
            <table border="1">
                <thead>
                    <tr>
                        <td>'.ucwords(str_replace('_',' ','country_organization')).'</td>
                        <td>'.ucwords(str_replace('_',' ','country_organization_other')).'</td>
                        <td>'.ucwords(str_replace('_',' ','title')).'</td>
                        <td>'.ucwords(str_replace('_',' ','family_name')).'</td>
                        <td>'.ucwords(str_replace('_',' ','first_name')).'</td>
                        <td>'.ucwords(str_replace('_',' ','prefered_name_on_badge')).'</td>
                        <td>'.ucwords(str_replace('_',' ','nationality')).'</td>
                        <td>'.ucwords(str_replace('_',' ','nationality_other')).'</td>
                        <td>'.ucwords(str_replace('_',' ','position')).'</td>
                        <td>'.ucwords(str_replace('_',' ','position_other')).'</td>
                        <td>'.ucwords(str_replace('_',' ','affiliation')).'</td>
                        <td>'.ucwords(str_replace('_',' ','email')).'</td>
                        <td>'.ucwords(str_replace('_',' ','telephone')).'</td>
                        <td>'.ucwords(str_replace('_',' ','fax')).'</td>
                        <td>'.ucwords(str_replace('_',' ','created_at')).'</td>
                    </tr>
                <thead>
                <tbody>
                   '.$rowHTML.'
                </tbody>
            </table>
        ';

        }


        public function mediaindex(){
            return view('admin.register.media');
        }
        
        public function mediadataTable(Request $request){
            if($request->ajax()) {
                $datas = \App\Models\MediaAttendance::select('*');
                return DataTables::of($datas)
                ->addColumn('action', function($row){  
                   // dd($row->toArray());
                    $html='';
                    foreach($row->toArray() as $k=>$v){
                        if($k != 'id' && $k != 'bdf_id' && $k != 'agree' && $k != 'created_at' && $k != 'updated_at'){

                            if($k == 'Letter_of_assignment' || $k == 'passport_ktp' ){
                                $html.='
                                <tr>
                                    <td>'.ucwords(str_replace('_',' ',$k)).'</td>
                                    <td>:</td>
                                    <td>
                                        <div class="register-img">
                                            <img src="'.asset('images/register/'.$v).'"  class="img-thumbnail" >
                                        </div>
                                    </td>
                                </tr>
                                ';


                            }else{
                                if($k !='media_other'){
                                    $html.='
                                            <tr>
                                                <td>'.ucwords(str_replace('_',' ',$k)).'</td>
                                                <td>:</td>
                                                <td>
                                                    '.$v.'
                                                </td>
                                            </tr>
                                    ';
                                }

                            }


                           
                        }
                    }


                    $btn = '
                           
                            <button  type="button" data-toggle="tooltip"  data-original-title="Detail" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'"  class="btn btn-primary  btn-xs  me-1" >Detail</i></button>
                                <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$row->id.'" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel'.$row->id.'">Detail</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped w-100">
                                                
                                                '.$html.'
                                               
    
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>       
                            ';
                    return $btn;
                })
                ->addColumn('name', function($row){ 
                    return $row->family_name.' '.$row->first_name;
                })
                ->editColumn('nationality', function($row) {
                    return !empty($row->nationality)?$row->nationality:$row->nationality_other;
                })
                ->rawColumns(['action','name'])   //merender content column dalam bentuk html
                ->escapeColumns()  //mencegah XSS Attack
                ->order(function ($query) {
                    $query->orderBy('id', 'DESC');
                })
                ->toJson(); 

        }


    }

    public function Mediaexcel(){
        $data=\App\Models\MediaAttendance::orderBy('id','DESC')->get();

        $table='';
       foreach($data as  $r){
        $table.='
                <tr>
                    <td>'.$r->family_name.'</td>
                    <td>'.$r->first_name.'</td>
                    <td>'.$r->nationality.'</td>
                    <td>'.$r->nationality_other.'</td>
                    <td>'.$r->date_of_birth.'</td>
                    <td>\''.$r->gender.'</td>
                    <td>'.$r->email.'</td>
                    <td>'.$r->phone.'\'</td>
                    <td>\''.$r->id_nummber.'\'</td>
                    <td>\''.$r->date_of_issuance.'</td>
                    <td>'.$r->date_of_expiry.'</td>
                    <td>'.$r->name_of_media.'</td>
                    <td>'.$r->media_other.'</td>
                    <td>'.$r->your_position_in_agency.'</td>
                    <td>'.$r->your_position_in_agency_other.'</td>
                    <td>'.$r->how_do_we_contact_you.'</td>
                    <td>'.$r->contact_person_name.'</td>
                    <td>\''.$r->contact_person_phone.'\'</td>
                    <td>'.$r->contact_person_email.'</td>
                    <td>'.$r->country_of_head_office_address.'</td>
                    <td>'.$r->your_office_address.'</td>
                    <td>'.$r->origin_of_media.'</td>
                    <td>'.$r->type_of_media.'</td>
                    <td>'.$r->type_of_media_other.' </td>
                    <td><a href="'.asset('images/register/'.$r->Letter_of_assignment).'" taget="_blank">'.asset('images/register/'.$r->Letter_of_assignment).'</a></td>
                    <td><a href="'.asset('images/register/'.$r->passport_ktp).'" taget="_blank">'.asset('images/register/'.$r->passport_ktp).'</a></td>
                    <td>'.$r->created_at.'</td>

                </tr?
        
            ';


       }

       header("Content-type: application/vnd-ms-excel");
       header("Content-Disposition: attachment; filename=Data Register Media Attendance_".date('Ymdhis').".xls");
        echo $html='
        <table border="1">
            <thead>
                <tr>
                    <td>'.ucwords(str_replace('_',' ','family_name')).'</td>
                    <td>'.ucwords(str_replace('_',' ','first_name')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nationality')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nationality_other')).'</td>
                    <td>'.ucwords(str_replace('_',' ','date_of_birth')).'</td>
                    
                    <td>'.ucwords(str_replace('_',' ','gender')).'</td>
                    <td>'.ucwords(str_replace('_',' ','phone')).'</td>
                    <td>'.ucwords(str_replace('_',' ','id_nummber')).'</td>
                    <td>'.ucwords(str_replace('_',' ','date_of_issuance')).'</td>
                    <td>'.ucwords(str_replace('_',' ','date_of_expiry')).'</td>
                    <td>'.ucwords(str_replace('_',' ','name_of_media')).'</td>
                    <td>'.ucwords(str_replace('_',' ','telephone')).'</td>
                    <td>'.ucwords(str_replace('_',' ','media_other')).'</td>
                    <td>'.ucwords(str_replace('_',' ','your_position_in_agency')).'</td>
                    <td>'.ucwords(str_replace('_',' ','your_position_in_agency_other')).'</td>
                    <td>'.ucwords(str_replace('_',' ','how_do_we_contact_you')).'</td>
                    <td>'.ucwords(str_replace('_',' ','contact_person_name')).'</td>
                    <td>'.ucwords(str_replace('_',' ','contact_person_phone')).'</td>
                    <td>'.ucwords(str_replace('_',' ','contact_person_email')).'</td>
                    <td>'.ucwords(str_replace('_',' ','country_of_head_office_address')).'</td>
                    <td>'.ucwords(str_replace('_',' ','your_office_address')).'</td>
                    <td>'.ucwords(str_replace('_',' ','origin_of_media')).'</td>
                    <td>'.ucwords(str_replace('_',' ','type_of_media_other')).'</td>
                    <td>'.ucwords(str_replace('_',' ','media_status')).'</td>
                    <td>'.ucwords(str_replace('_',' ','Letter_of_assignment')).'</td>
                    <td>'.ucwords(str_replace('_',' ','passport_ktp')).'</td>
                    <td>'.ucwords(str_replace('_',' ','created_at')).'</td>
                </tr>
            <thead>
            <tbody>
               '. $table.'
            </tbody>
        </table>';
    }


    public function guestindex(){
        return view('admin.register.guest');
    }

    //guestataTable
    public function guestataTable(Request $request){
        if($request->ajax()) {
            $datas = \App\Models\GuestAttendance::select('*');
            return DataTables::of($datas)
            ->addColumn('action', function($row){  
                
                $html='';
                foreach($row->toArray() as $k=>$v){
                    if($k != 'id' && $k != 'bdf_id' && $k != 'agree' && $k != 'created_at' && $k != 'updated_at'){

                        if($k == 'photo' || $k == 'diplomatic_note' ){
                            $html.='
                            <tr>
                                <td>'.ucwords(str_replace('_',' ',$k)).'</td>
                                <td>:</td>
                                <td>
                                    <div class="register-img">
                                        <img src="'.asset('images/register/'.$v).'"  class="img-thumbnail" >
                                    </div>
                                </td>
                            </tr>
                            ';


                        }else{
                            $html.='
                                    <tr>
                                        <td>'.ucwords(str_replace('_',' ',$k)).'</td>
                                        <td>:</td>
                                        <td>
                                            '.$v.'
                                        </td>
                                    </tr>
                            ';

                        }


                       
                    }
                }


                $btn = '
                       
                        <button  type="button" data-toggle="tooltip"  data-original-title="Detail" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'"  class="btn btn-primary  btn-xs  me-1" >Detail</i></button>
                            <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$row->id.'" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel'.$row->id.'">Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped w-100">
                                            
                                            '.$html.'
                                           

                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>       
                        ';
                return $btn;
            })
            ->addColumn('name', function($row){ 
                return $row->family_name.' '.$row->first_name;
            })
            ->editColumn('nationality', function($row) {
                return !empty($row->nationality)?$row->nationality:$row->nationality_other;
            })
            ->rawColumns(['action','name'])   //merender content column dalam bentuk html
            ->escapeColumns()  //mencegah XSS Attack
            ->order(function ($query) {
                $query->orderBy('id', 'DESC');
            })
            ->toJson(); 

        }

    


    }


    //guestexcel
    public function guestexcel(){
        $data=\App\Models\GuestAttendance::orderBy('id','DESC')->get();
        //dd($data);
        $table='';
       foreach($data as  $r){
        $table.='
                <tr>
                    <td>'.$r->country_organization.'</td>
                    <td>'.$r->country_organization_other.'</td>
                    <td>'.$r->title.'</td>
                    <td>'.$r->family_name.'</td>
                    <td>'.$r->first_name.'</td>
                    <td>'.$r->prefered_name_on_badge.'</td>
                    <td>'.$r->nationality.'</td>
                    <td>'.$r->nationality_other.'</td>
                    <td>'.$r->affiliation.'</td>
                    <td>'.$r->official_title.'</td>
                    <td>'.$r->office_address.'</td>
                    <td>'.$r->gender.'</td>
                    <td>'.$r->email.'</td>
                    <td>'.$r->telephone.'</td>
                    <td>'.$r->fax.'</td>
                    <td>\''.$r->passport_no.'\'</td>
                    <td>'.$r->date_of_issuance.'</td>
                    <td>'.$r->date_of_expiry.'</td>
                    <td><a href="'.asset('images/register/'.$r->photo).'" target="_blank">'.asset('images/register/'.$r->photo).'</a></td>
                    <td><a href="'.asset('images/register/'.$r->photo).'" target="_blank">'.asset('images/register/'.$r->diplomatic_note).'</a></td>
                    <td>'.$r->created_at.'</td>

                </tr>
        
            ';


       }

       header("Content-type: application/vnd-ms-excel");
       header("Content-Disposition: attachment; filename=Data Register Media Attendance_".date('Ymdhis').".xls");
        echo $html='
        <table border="1">
            <thead>
                <tr>
                    <td>'.ucwords(str_replace('_',' ','country_organization')).'</td>
                    <td>'.ucwords(str_replace('_',' ','country_organization_other')).'</td>
                    <td>'.ucwords(str_replace('_',' ','title')).'</td>
                    <td>'.ucwords(str_replace('_',' ','family_name')).'</td>
                    <td>'.ucwords(str_replace('_',' ','first_name')).'</td>
                    <td>'.ucwords(str_replace('_',' ','prefered_name_on_badge')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nationality')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nationality_other')).'</td>
                    <td>'.ucwords(str_replace('_',' ','affiliation')).'</td>
                    <td>'.ucwords(str_replace('_',' ','official_title')).'</td>
                    <td>'.ucwords(str_replace('_',' ','office_address')).'</td>
                    <td>'.ucwords(str_replace('_',' ','gender')).'</td>
                    <td>'.ucwords(str_replace('_',' ','email')).'</td>
                    <td>'.ucwords(str_replace('_',' ','telephone')).'</td>
                    <td>'.ucwords(str_replace('_',' ','fax')).'</td>
                    <td>'.ucwords(str_replace('_',' ','passport_no')).'</td>
                    <td>'.ucwords(str_replace('_',' ','passport date_of_issuance')).'</td>
                    <td>'.ucwords(str_replace('_',' ','passport date_of_expiry')).'</td>
                    <td>'.ucwords(str_replace('_',' ','diplomatic_note')).'</td>
                    <td>'.ucwords(str_replace('_',' ','photo')).'</td>
                    <td>'.ucwords(str_replace('_',' ','created_at')).'</td>
                </tr>
            <thead>
            <tbody>
               '. $table.'
            </tbody>
        </table>';
    }
    
    //commiteeindex
    public function commiteeindex(){
        return view('admin.register.commitee');
    }

    //commiteeTable
    public function commiteeTable(Request $request){
        if($request->ajax()) {
            $datas = \App\Models\CommiteAttendance::select('*');
            return DataTables::of($datas)
            ->addColumn('action', function($row){  
                //print_r($row->toArray());
                $html='';
                foreach($row->toArray() as $k=>$v){
                    if($k != 'id' && $k != 'bdf_id' && $k != 'agree' && $k != 'created_at' && $k != 'updated_at'){

                        if($k == 'foto' || $k == 'ktp' ){
                            $html.='
                            <tr>
                                <td>'.ucwords(str_replace('_',' ',$k)).'</td>
                                <td>:</td>
                                <td>
                                    <div class="register-img">
                                        <img src="'.asset('images/register/'.$v).'"  class="img-thumbnail" >
                                    </div>
                                </td>
                            </tr>
                            ';


                        }else{
                            $html.='
                                    <tr>
                                        <td>'.ucwords(str_replace('_',' ',$k)).'</td>
                                        <td>:</td>
                                        <td>
                                            '.$v.'
                                        </td>
                                    </tr>
                            ';

                        }


                       
                    }
                }


                $btn = '
                       
                        <button  type="button" data-toggle="tooltip"  data-original-title="Detail" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'"  class="btn btn-primary  btn-xs  me-1" >Detail</i></button>
                            <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$row->id.'" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel'.$row->id.'">Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped w-100">
                                            
                                            '.$html.'
                                           

                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>       
                        ';
                return $btn;
            })
            ->addColumn('name', function($row){ 
                return $row->family_name.' '.$row->first_name;
            })
            ->editColumn('nationality', function($row) {
                return !empty($row->nationality)?$row->nationality:$row->nationality_other;
            })
            ->rawColumns(['action','name'])   //merender content column dalam bentuk html
            ->escapeColumns()  //mencegah XSS Attack
            ->order(function ($query) {
                $query->orderBy('id', 'DESC');
            })
            ->toJson(); 

        }
    }


    public function commiteeexcel(){
        $data=\App\Models\CommiteAttendance::orderBy('id','DESC')->get();
        //dd($data);
        $table='';
       foreach($data as  $r){
        $table.='
                <tr>
                   
                    <td>'.$r->nama_lengkap.'</td>
                    <td>'.$r->prefered_name_on_badge.'</td>
                    <td>'.$r->jabatan.'</td>
                    <td>\''.$r->nik.'\'</td>
                    <td>'.$r->satuan_kerja.'</td>
                    <td>'.$r->bidang_kepanitiaan.'</td>
                    <td>\''.$r->nomor_rekening.'\'</td>
                    <td>'.$r->bank.'</td>
                    <td>'.$r->email.'</td>
                    <td>'.$r->phone.'</td>
                   
                    <td>'.$r->nomor_pesawat.'</td>
                    <td>\''.$r->jam.'\'</td>
                    <td>\''.$r->nomor_pesawat_pulang.'\'</td>
                    <td>'.$r->tanggal_pulang.'</td>
                    <td>'.$r->jam_pulang.'</td>
                    <td><a href="'.asset('images/register/'.$r->foto).'" target="_blank">'.asset('images/register/'.$r->foto).'</a></td>
                    <td><a href="'.asset('images/register/'.$r->ktp).'" target="_blank">'.asset('images/register/'.$r->ktp).'</a></td>
                    <td>'.$r->created_at.'</td>

                </tr>
        
            ';


       }

       header("Content-type: application/vnd-ms-excel");
       header("Content-Disposition: attachment; filename=Data Register Commite Attendance_".date('Ymdhis').".xls");
        echo $html='
        <table border="1">
            <thead>
                <tr>
                   
                    <td>'.ucwords(str_replace('_',' ','nama_lengkap')).'</td>
                    <td>'.ucwords(str_replace('_',' ','prefered_name_on_badge')).'</td>
                    <td>'.ucwords(str_replace('_',' ','jabatan')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nik')).'</td>
                    <td>'.ucwords(str_replace('_',' ','satuan_kerja')).'</td>
                    <td>'.ucwords(str_replace('_',' ','bidang_kepanitiaan')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nomor_rekening')).'</td>
                    <td>'.ucwords(str_replace('_',' ','bank')).'</td>
                    <td>'.ucwords(str_replace('_',' ','email')).'</td>
                    <td>'.ucwords(str_replace('_',' ','phone')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nomor_pesawat')).'</td>
                    
                    <td>'.ucwords(str_replace('_',' ','jam')).'</td>
                    <td>'.ucwords(str_replace('_',' ','nomor_pesawat_pulang')).'</td>
                    <td>'.ucwords(str_replace('_',' ','tanggal_pulang')).'</td>
                    <td>'.ucwords(str_replace('_',' ','jam_pulang')).'</td>
                    <td>'.ucwords(str_replace('_',' ','foto')).'</td>
                    <td>'.ucwords(str_replace('_',' ','ktp')).'</td>
                    <td>'.ucwords(str_replace('_',' ','created_at')).'</td>
                </tr>
            <thead>
            <tbody>
               '. $table.'
            </tbody>
        </table>';


    }

}