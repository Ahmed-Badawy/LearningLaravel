- u can send data with view: view('view-name',[]) or using view('view',compact(variable)) or using ->with([])

- composer dump-autoload
- php artisan make:controller mainController
- php artisan make:model note -m
- php artisan migrate
- php artisan migrate:rollback		//migrate back one step
- php artisan migrate:refresh   //migrate all table
- php artisan tinker
- php artisan db:seed
- php artisan	make:migration create_cards_table --create=cards // create migration for the table cards


Resetful Convertion:-
	- Route::get('cards','CardsController@index');
	- Route::get('cards/create','CardsController@create');
	- Route::post('cards','CardsController@store'); //submit create form
	- Route::get('cards/1','CardsController@show');
	- Route::get('cards/1/edit','CardsController@edit');
	- Route::put('cards/1','CardsController@update'); //submit update form
	- Route::delete('cards/1','CardsController@destroy'); //delete 


//to find a record you can use: 
	- $card = Card::find($id) //this is the normal way to do it
	- in the controller decliration : public function show(Card $card){ this will get a card record from db directily }

//getting params in controllers
	- in the controller: public function show(Request $request){will get the params you passed to the method}
	- you can get automatic access like this: 
	public function show(Request $request, Note $note){
		$note->update($request->all()); //this means get note instance then update it with the request area
	}


//RelationShips in the models:
		//inside card model
				public function notes(){
					return $this->hasMany(Note::class);
					//or $this->belongsTo();
				}
//other thing in relations
		//if you want to do join operation with multiple levels 
			$all_cards = Card::with('notes').find(1); //this means get the cards & inner join the notes attached.
		//you can also add multiple level something init



//ways to insert
		$note = new Note;
		$note->txt = $request->txt;
		$note->save($note);
	//or 
		$note->save(new Note(['txt'=>$request->txt]))
	//or 
		$note->create(['txt'=>$request->txt])
	//or 
		$note->create($request->all()); //but for this you must set the $fillable inside your model

//redirect
	return back();

// hashing for passwords: you can use bycrypt function:  bcrypt('password');














