<?php

namespace App;
use Carbon\Carbon;
use DB;	

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
	'user_id', 'vehicle_id', 'amount','staus', 'mode_of_payment','route','toll_user_id'
	];
	public $table = "transactions";
	public function check_for_payment($vehicle_no,$toll_id){
		$datas = self::join('vehicles','vehicles.id','=','transactions.vehicle_id')->where('transactions.status','1')->where('vehicles.vehicle_no',$vehicle_no)->get();
		if(!empty($datas)){
			foreach($datas as $data)
			{
				$journey_time = $data->date;
				$journey_time = new Carbon($journey_time);
				$arrival_time = Carbon::now();
				$diff= $journey_time->diff($arrival_time)->days;
				if($diff<1){
					$toll_list = $data->route;
					$toll_list_arr = json_decode($toll_list,true);
					$key=array_search($toll_id,$toll_list_arr);
					if(is_numeric($key)){
						//payment made for this toll
						unset($toll_list_arr[$key]);
						$toll_list_obj = (object) $toll_list_arr;
						$toll_list= json_encode($toll_list_obj);
						$data->route = $toll_list;
						$data->save();
						return 1;
					}
					else{
						//payment not made for this toll
						continue;
					}
				}
				else{
					//not for this time
					continue;
				}
			}
		}
		else{
			//no payment
			return "NO pay";
		}
		return 0;
	}  
}
