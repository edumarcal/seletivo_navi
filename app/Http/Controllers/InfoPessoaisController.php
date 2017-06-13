<?php
// Agradeço a DEUS pelo dom do conhecimento
namespace App\Http\Controllers;
use App\Enderecos;
use App\InfoPessoais;
use Illuminate\Http\Request;

class InfoPessoaisController extends Controller
{
    public function __construct() {
      $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = InfoPessoais::with('enderecos')->get();
        return response()->json($info);
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
      try
      {
        $info = new InfoPessoais();
        $info->fill($request->all());
        $info->save();
        return response()->json($info, 201);
      }
      catch (Exception $e)
      {
        return response()->json(['create' => false], 404);
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
        $info = InfoPessoais::find($id);
        return $info ?
        response()->json($info) :
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
        $info = InfoPessoais::find($id);
        if ($info)
        {
            $info->fill($request->all());
            $info->save();
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
        $info = InfoPessoais::find($id);
        if ($info)
        {
            $info->delete();
            return response()->json(['delete' => true]);
        }
        else
        {
          return response()->json(['delete' => false], 204);
        }
    }
  }
}
