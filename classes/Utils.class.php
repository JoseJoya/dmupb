<?php
//THIS CLASS IS FOR UTILITIES, CONVERSIONS AND CALCULATE DISTANCES
class Utils{

	//this method calculate the euclidean distances between two vectors with same length
	public static function calculate_euclidean($vector1,$vector2){
		
		//validate if lenghts are equals
		if(Utils::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$temp= $vector1[$i]-$vector2[$i];
			$temp*=$temp;
			$output+=$temp;
		}
		unset($temp);
		return sqrt($output);
	}
	//this method calculate the square euclidean distances between two vectors with same length
	public static function calculate_qeuclidean($vector1,$vector2){
		//validate if lenghts are equals
		if(Utils::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$temp= $vector1[$i]-$vector2[$i];
			$temp*=$temp;
			$output+=$temp;
		}
		unset($temp);
		return $output;
	}
	//this method calculate the manhathan distances between two vectors with same length
	public static function calculate_manhathan($vector1,$vector2){
		//validate if lengths are equals
		if(Utils::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$output+=abs($vector1[$i]-$vector2[$i]);
		}
		return $output;
	}

	//this method predicts a value of an incomplete register, taking into consideration a predictor value
	public static function predict($field /*name of Field*/,$array_registers /*type: patient*/,$predictor/*predictor field*/){
		switch ($field){
			case 'age' :
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getAge()!="?"){
						return $comparator->getAge();
					}
				}
				break;
			case 'sex' :
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getSex()!="?"){
						return $comparator->getSex();
					}
				}
				break;
			case 'cp':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getCp()!="?"){
						return $comparator->getCp();
					}
				}
				break;
			case 'trestbps':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getTrestbps()!="?"){
						return $comparator->getTrestbps();
					}
				}
				break;
			case 'chol':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getChol()!="?"){
						return $comparator->getChol();
					}
				}
				break;
			case 'fbs':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getFbs()!="?"){
						return $comparator->getFbs();
					}
				}
				break;
			case 'restecg':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getRestecg()!="?"){
						return $comparator->getRestecg();
					}
				}
				break;
			case 'thalach':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getThalach()!="?"){
						return $comparator->getThalach();
					}
				}
				break;
			case 'exang':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getExang()!="?"){
						return $comparator->getExang();
					}
				}
				break;
			case 'oldpeak':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getOldpeak()!="?"){
						return $comparator->getOldpeak();
					}
				}
				break;
			case 'slope':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getSlope()!="?"){
						return $comparator->getSlope();
					}
				}
				break;
			case 'ca':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getCa()!="?"){
						return $comparator->getCa();
					}
				}
				break;
			case 'thal':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getThal()!="?"){
						return $comparator->getThal();
					}
				}
				break;
			default:
				return "?";
		}
	}
	//this method clean de impure data set
	public static function clean_data($array_patients){
		foreach ($array_patients as $data){
			if($data->getAge()=="?"){
				$data->setAge(Utils::predict('age',$array_patients,$data->getNum()));
			}
			if($data->getSex()=="?"){
				$data->setSex(Utils::predict('sex',$array_patients,$data->getNum()));
			}
			if($data->getCp()=="?"){
				$data-setCp(Utils::predict('cp',$array_patients,$data->getNum()));
			}
			if($data->getTrestbps()=='?'){
				$data->setTrestbps(Utils::predict('trestbps',$array_patients,$data->getNum()));
			}
			if($data->getChol()=="?"){
				$data->setChol(Utils::predict('chol',$array_patients,$data->getNum()));
			}
			if($data->getFbs()=="?"){
				$data->setFbs(Utils::predict('fbs',$array_patients,$data->getNum()));
			}
			if($data->getRestecg()=="?"){
				$data->setRestecg(Utils::predict('restecg',$array_patients,$data->getNum()));
			}
			if($data->getThalach()=="?"){
				$data->setThalach(Utils::predict('thalach',$array_patients,$data->getNum()));
			}
			if($data->getExang()=="?"){
				$data->setExang(Utils::predict('exang',$array_patients,$data->getNum()));
			}
			if($data->getOldpeak()=="?"){
				$data->setOldpeak(Utils::predict('oldpeak',$array_patients,$data->getNum()));
			}
			if($data->getSlope()=="?"){
				$data->setSlope(Utils::predict('slope',$array_patients,$data->getNum()));
			}
			if($data->getCa()=="?"){
				$data->setCa(Utils::predict('ca',$array_patients,$data->getNum()));
			}
			if($data->getThal()=="?"){
				$data->setThal(Utils::predict('thal',$array_patients,$data->getNum()));
			}
		}
		return $array_patients;
	}
	//this method compare the size of two vectors, if it equals return true otherwise return false
	private static function validate_size($v1,$v2){
		if(sizeof($v1)!= sizeof($v2)){
			return true;
		}else{
			return false;
		}
	}
}
?>