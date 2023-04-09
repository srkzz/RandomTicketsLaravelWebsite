<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //* todos testemunhos
    public function index () {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)
        
        ]);
    }

    // testemunho unico
    public function show(Listing $listing) {
        return view('listings.show',  [   
            'listing' => $listing
        ]);
    }

    // Mostrar e criar 
    public function create() {
        return view('listings.create');
    }

    // Guardar dados
    public function store(Request $request) {

        $formFields = $request->validate([
            'title' => 'required', 
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect ('/')->with('message','Postado com Sucesso!');
    }

    // Edição de formulario

    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    //update 
    public function update(Request $request, Listing $listing) {
        
        //controlar o acesso
        if($listing->user_id != auth()->id()){

            abort(403, 'Não autorizado.');
        }

        $formFields = $request->validate([
            'title' => 'required', 
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        }

        $listing->update($formFields); // ja não precisamos  de usar a tabela estatica porque já temos uma criada ($listing)

        return view('listings.show', ['listing' => $listing])->with('message','Editado com Sucesso!');

    }

    // delete /apagar 
    public function destroy(Listing $listing) {
         //controlar o acesso
         if($listing->user_id != auth()->id()){

            abort(403, 'Não autorizado.');
        }
        
        $listing->delete();
        
        return redirect('/')->with('message' , 'Apagado com sucesso.');
    }

    // gerir os tickets do user

    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

}
