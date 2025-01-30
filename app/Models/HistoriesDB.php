<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class HistoriesDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'histories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    public function input($id, $type, $action, $old,$new, $colom, $additionalData)
    {
        // $user = User::where('id', )->first();
        $params['ref_id']= $id;
        $params['ref_type']= $type;
        $params['desc'] = '';
        $unique = '';
        try {
            //code...
            if ($action =='delete') {
                if ($type=='product') {
                    $data = ProductDB::where('id', $id)->first();
                    $data->name = $data->product_name;
    
                    $history = new ProductHistoriesDB();
                    $history->input($additionalData);
                } else if ($type == 'user') {
                    $data = User::where('id', $id)->first();
    
                    $history = new UserHistoriesDB();
                    $history->input($additionalData);
                }
                
                $params['desc'] = $params['desc']. Auth::user()->name+' telah menghapus '.$data->name;
            } else {
                if ($type == 'product') {
                    $data = ProductDB::where('id', $id)->first();
                    $data->name = $data->product_name;
                    $unique =$data->product_code;
    
                    $history = new ProductHistoriesDB();
                    $history->input($additionalData);
                    $params['desc'] = $params['desc']. Auth::user()->name.' telah mengubah '. $unique.', kolom '.$colom.' dari '.$old.' menjadi '. $new;
                } else if ($type == 'user') {
                    $data = User::where('id', $id)->first();
                    $unique =$data->email;
                    
                    $history = new UserHistoriesDB();
                    $history->input($additionalData);
                    $params['desc'] = $params['desc']. Auth::user()->name.' telah mengubah '. $unique.', kolom '.$colom.' dari '.$old.' menjadi '. $new;
                }
                else if ($type == 'event') {
                    $data = JobsDB::where('id',$id)->first();
                    $unique = $data->event_name;
    
                    $history = new JobHistoryDB();
                    $additionalData['created_by']=Auth::user()->id;
                    $additionalData['updated_by']=Auth::user()->id;
                    $additionalData['deleted_by']=0;
                    $history->input($additionalData);
                    $params['desc'] = $params['desc'] . Auth::user()->name . ' telah mengubah ' . $unique . ', kolom ' . $colom . ' dari ' . $old . ' menjadi ' . $new;
                }
                else if ($type == 'event_detail') {
                    $data = JobDetailsDB::where('id',$id)->first();
                    // $unique = $data->event_name;

                    $params['ref_type'] = 'Detail Event';
                    $history = new JobDetailHistoryDB();
                    $additionalData['job_detail_id']=$data->id;
                    $additionalData['created_by']=Auth::user()->id;
                    $additionalData['updated_by']=Auth::user()->id;
                    $additionalData['deleted_by']=0;
                    $history->input($additionalData);
                    $params['desc'] = $params['desc'] . Auth::user()->name . ' telah menambah ' . $data->product->code . ' ke ' . $data->event->event_name ;
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage().' || '.$th->getLine());
        }
        
        return HistoriesDB::create($params);
    }
}
