<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
	'user_id', 'vehicle_id', 'amount','status', 'mode_of_payment','route'
	];
	public $table = "transactions";
	public function check_for_payment($vehicle,$date,$toll_id,$data){
		$to_time = strtotime($date);
		$from_time = strtotime();
		$diff= round(abs($to_time - $from_time) / 60,2);
		if($diff<24*60){
			$data = self::where(['status','1'],
							['vehicle_id',$vehicle])->get();
			if(!empty($data)){
				$toll_list = $data[0]->route;
				$toll_list_arr = json_decode($toll_list);
				$key=array_search($toll_id,$toll_list_arr)
				if($key!=false){
					//payment made for this toll
					unset($toll_list_arr[$key]);
					$toll_list= json_encode($toll_list_arr);
					$data[0]->route = $toll_list;
					$data->save();
					return 1;
				}
				else{
					//payment not made for this toll
					return 0;
				}
			}
			else
			{
				//no payment
				return 0;
			}
		}
		else{
			//timeout
			return 0;
		}
		return 0;
	}  
}
