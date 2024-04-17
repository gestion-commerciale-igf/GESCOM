<?php

namespace App\Http\Controllers;

use App\Models\InfoDepot;
use Illuminate\Http\Request;

class InfoDepotController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'responsable_depot' => 'required|string',
            'adresse'=> 'required|string',
            'complement'=> 'required|string',
            'code_postal'=> 'required|string',
            'region'=> 'required|string',
            'ville'=> 'required|string',
            'pays'=> 'required|string',
            'telephone'=> 'required|string',
            'email'=> 'required|string',
        ]);

        // Création de la société
        $depot = new InfoDepot;
        $depot->nom = $request->nom ?? $depot->nom;
        $depot->responsable_depot = $request->responsable_depot ?? $depot->responsable_depot;
        $depot->adresse = $request->adresse ?? $depot->adresse;
        $depot->complement = $request->complement ?? $depot->complement;
        $depot->code_postal = $request->code_postal ?? $depot->code_postal;
        $depot->region = $request->region ?? $depot->region;
        $depot->ville = $request->ville ?? $depot->ville;
        $depot->pays = $request->pays ?? $depot->pays;
        $depot->telephone = $request->telephone ?? $depot->telephone;
        $depot->email = $request->email ?? $depot->email;


        // Enregistrement dans la base de données
        $depot->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'infoDepot insérée avec succès'], 201);
    }

    public function getdepot(){
        $depot = InfoDepot::all();
        return response()->json($depot, 200);


    }

    public function updatedepot(Request $request,$id){
        $depot = InfoDepot::find($id);

        if (!$depot) {
             return response()->json([
                'Message' =>'informations inexistant'
            ],404);
        }

        $request->validate([
            'nom' => 'required|string',
            'responsable_depot' => 'required|string',
            'adresse'=> 'required|string',
            'complement'=> 'required|string',
            'code_postal'=> 'required|string',
            'region'=> 'required|string',
            'ville'=> 'required|string',
            'pays'=> 'required|string',
            'telephone'=> 'required|string',
            'email'=> 'required|string',
        ]);



        $depot->nom = $request->nom ?? $depot->nom;
        $depot->responsable_depot = $request->responsable_depot ?? $depot->responsable_depot;
        $depot->adresse = $request->adresse ?? $depot->adresse;
        $depot->complement = $request->complement ?? $depot->complement;
        $depot->code_postal = $request->code_postal ?? $depot->code_postal;
        $depot->region = $request->region ?? $depot->region;
        $depot->ville = $request->ville ?? $depot->ville;
        $depot->pays = $request->pays ?? $depot->pays;
        $depot->telephone = $request->telephone ?? $depot->telephone;
        $depot->email = $request->email ?? $depot->email;


        $depot->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'informations modifiée avec succès'], 200);
    }

    public function findByName($nom)
    {
        $depot = InfoDepot::where('nom', $nom)->first();

        if (!$depot) {
            return response()->json(['Message => informations inexistant'], 404);
        }else{
            return response()->json([
                "statut" => "success",
                "Data" => $depot
            ], 200);
        }

    }

    public function findByid(Request $request, $id)
    {
        $depot = InfoDepot::find($id);

        if (!$depot) {
            return response()->json(['Message => depot inexistante'], 404);
        }
        return response()->json($depot, 200);
    }

    public function supprimer(Request $request,$id){
        $depot = InfoDepot::find($id);

        if (!$depot) {
            return response()->json(['Message => informations inexistante'],404);
       }
       $depot->delete();
       return response()->json(['message' => 'informations supprimée avec succès'], 200);
    }
}
