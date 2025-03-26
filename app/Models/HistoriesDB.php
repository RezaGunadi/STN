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

    public function input($id, $type, $action, $old, $new, $colom, $additionalData)
    {
        // $user = User::where('id', )->first();
        $params['ref_id'] = $id;
        $params['ref_type'] = $type;
        $params['desc'] = '';
        $params['created_by'] =  Auth::user()->id;
        $unique = '';
        try {
            //code...
            if ($action == 'delete') {
                if ($type == 'product') {
                    $data = ProductDB::where('id', $id)->first();
                    $data->name = $data->product_name;

                    $history = new ProductHistoriesDB();
                    $history->input($additionalData);
                } else if ($type == 'user') {
                    $data = User::where('id', $id)->first();

                    $history = new UserHistoriesDB();
                    $history->input($additionalData);
                } else if ($type == 'product_type') {
                    $data = ProductTypeDB::where('id', $id)->first();

                    // $history = new UserHistoriesDB();
                    // $history->input($additionalData);
                }
                $params['desc'] = $params['desc'] . ' telah menghapus kategori ' . $data->category
                    . ',brand ' . $data->brand
                    . ',type ' . $data->type
                    . ',code ' . $data->code;
            } else {
                if ($action == 'create') {
                    # code...
                    if ($type == 'user') {
                        $data = User::where('id', $id)->first();
                        $unique = $data->email;

                        $history = new UserHistoriesDB();
                        $history->input($additionalData);
                        $params['desc'] = $params['desc'] . ' telah menambah pengguna dengan email ' . $data->email;
                    }
                    if ($type == 'product_type') {
                        $data = ProductTypeDB::where('id', $id)->first();
                        $unique = $data->email;

                        // $history = new UserHistoriesDB();
                        // $history->input($additionalData);
                        $params['desc'] = $params['desc'] . ' telah menambah kategori ' . $data->category
                            . ',brand ' . $data->brand
                            . ',type ' . $data->type
                            . ',code ' . $data->code;
                    }
                } else {
                    # code...
                    if ($type == 'product') {
                        $data = ProductDB::where('id', $id)->first();
                        $data->name = $data->product_name;
                        $unique = $data->product_code;

                        $history = new ProductHistoriesDB();
                        $history->input($additionalData);
                        $params['desc'] = $params['desc'] . ' telah mengubah ' . $unique . ', kolom ' . $colom . ' dari ' . $old . ' menjadi ' . $new;
                    } else if ($type == 'user') {
                        $data = User::where('id', $id)->first();
                        $unique = $data->email;

                        $history = new UserHistoriesDB();
                        $history->input($additionalData);
                        $params['desc'] = $params['desc'] . ' telah mengubah ' . $unique . ', kolom ' . $colom . ' dari ' . $old . ' menjadi ' . $new;
                    } else if ($type == 'event') {
                        $data = JobsDB::where('id', $id)->first();
                        $unique = $data->event_name;

                        $history = new JobHistoryDB();
                        $additionalData['created_by'] = Auth::user()->id;
                        $additionalData['updated_by'] = Auth::user()->id;
                        $additionalData['deleted_by'] = 0;
                        $history->input($additionalData);
                        $params['desc'] = $params['desc'] . ' telah mengubah ' . $unique . ', kolom ' . $colom . ' dari ' . $old . ' menjadi ' . $new;
                    } else if ($type == 'event_detail') {
                        $data = JobDetailsDB::where('id', $id)->first();
                        // $unique = $data->event_name;

                        $params['ref_type'] = 'Detail Event';
                        $history = new JobDetailHistoryDB();
                        $additionalData['job_detail_id'] = $data->id;
                        $additionalData['created_by'] = Auth::user()->id;
                        $additionalData['updated_by'] = Auth::user()->id;
                        $additionalData['deleted_by'] = 0;
                        $history->input($additionalData);
                        $params['desc'] = $params['desc'] . ' telah menambah ' . $data->product->code . ' ke ' . $data->event->event_name;
                    }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage() . ' || ' . $th->getLine());
        }

        return HistoriesDB::create($params);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
