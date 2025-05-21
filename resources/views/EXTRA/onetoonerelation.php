
			is me 2 model bnay gy hm ur phr ik model sy dsry model ko inherit kr k data nikaly gy us k 

			yes sir, i made two method in model and no error, it means we can do in the model.
Example:  public function getCompanyData()
    {
        return $this->hasOne('App\Models\Company','emp_id');
    }

    public function getCompanyData1()
    {
        return $this->hasMany('App\Models\Company','emp_id');
    }