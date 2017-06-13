<?php
// Agradeço a DEUS pelo dom do conhecimento
namespace App\Http\Controllers;
use App\Enderecos;

use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(Enderecos::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request);
        if($validator->fails())
        {
          return response()->json([
            'message' => 'Validation Failed',
            'errors' => $validator->errors()
          ], 422);
          $endereco = new Enderecos();
          $endereco->fill($request->all());
          $endereco->save();
        return response()->json($endereco, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if(preg_match('/^[0-9]*$/', $id))
      {
        $endereco = Enderecos::find($id);
        return $endereco ?
          response()->json($endereco) :
          response()->json(['error' => 'not found'], 404);
      }

      return response()->json(['error' => 'url mal-formada'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if(preg_match('/^[0-9]*$/', $id))
      {
        $endereco = Enderecos::find($id);
        if ($endereco)
        {
            $endereco->fill($request->all());
            $endereco->save();
            return response()->json($endereco);
        }
        else
        {
          return response()->json(['error' => 'not found'], 404);
        }
    }
  }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(preg_match('/^[0-9]*$/', $id))
      {
        $endereco = Enderecos::find($id);
        if ($endereco)
        {
            $endereco->delete();
            return response()->json(['delete' => true]);
        }
        else
        {
          return response()->json(['delete' => false], 204);
        }
      }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data)
    {
        return Validator::make($data->all(), [
            'nome_logradouro' => 'required|string|max:255',
            'tipo_logradouro' => 'required|string|max:255',
            'numero' => 'required|integer|min:1',
            'complemento' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'localidade' => 'required|string|max:255',
            'sigla' => 'required|string|max:2',
            'cep' => 'required|string|max:9'
        ]);
    }
}
