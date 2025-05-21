type in model accessor 

	databse ki value ko show krny sy phly apni mrzi sy change kr skty hy 

function getNameAttributes($value){
	return ucfirst($value);
}

function getAddressAttributes($value){
	return $value ."pakistan";
}



	databse ki value ko enter hony sy phly apni mrzi sy change kr skty hy 

	function setAddressAttributes($value){
	return $this->attribute['address']= $value ."pakistan";
}

	function getNameAttributes($value){
	return $this->attribute['name']= 'Mr. ' $value;
}


 agar phly sy laga ha Mr. tu restriction kaisy lagani ha 

 
We can use if(trim($value, 'Mr')){ return $this->attributes['name'] = $value } else{ return $this->attributes['name'] = "Mr  ".$value }