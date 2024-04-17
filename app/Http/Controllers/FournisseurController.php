<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'compte_tiers' => 'required|string',
            'intitule' => 'required|string',
            'adresse' => 'required|string',
            'complement' => 'required|string',
            'region' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|string',
            'code_postal' => 'required|string',
            'ninea' => 'required|string'
        ]);


// Créer une nouvelle instance du modèle Client
    $fournisseur = new Fournisseur;

    $fournisseur->compte_tiers = $request->compte_tiers;
    $fournisseur->intitule = $request->intitule;
    $fournisseur->adresse = $request->adresse;
    $fournisseur->complement = $request->complement;
    $fournisseur->region = $request->region;
    $fournisseur->ville = $request->ville;
    $fournisseur->pays = $request->pays;
    $fournisseur->telephone = $request->telephone;
    $fournisseur->email = $request->email;
    $fournisseur->code_postal  = $request->code_postal ;
    $fournisseur->ninea = $request->ninea;

    // Enregistrement dans la base de données
    $fournisseur->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'fournisseur inséré avec succès'], 201);
    }





    public function getfournisseur(){
        $fournisseur = Fournisseur::all();
        return response()->json($fournisseur, 200);

    }






    public function updatefournisseur(Request $request,$id){
        $fournisseur = Fournisseur::find($id);

        if (!$fournisseur) {
             return response()->json(['Message => Fournisseur inexistant'],404);
        }

        $request->validate([
            'compte_tiers' => 'required|string',
            'intitule' => 'required|string',
            'adresse' => 'required|string',
            'complement' => 'required|string',
            'region' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|string',
            'code_postal' => 'required|string',
            'ninea' => 'required|string'

        ]);

    $fournisseur->compte_tiers = $request->compte_tiers;
    $fournisseur->intitule = $request->intitule;
    $fournisseur->adresse = $request->adresse;
    $fournisseur->complement = $request->complement;
    $fournisseur->region = $request->region;
    $fournisseur->ville = $request->ville;
    $fournisseur->pays = $request->pays;
    $fournisseur->telephone = $request->telephone;
    $fournisseur->email = $request->email;
    $fournisseur->code_postal  = $request->code_postal ;
    $fournisseur->ninea = $request->ninea;


        $fournisseur->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'fournisseur modifiée avec succès'], 200);
    }




    public function findByName($nom)
    {
        $fournisseur = Fournisseur::where('nom', $nom)->first();
        if (!$fournisseur) {
            return response()->json(['Message => fournisseur inexistant'], 404);
        }
        return response()->json([
            "statut" => "success",
            "Data" => $fournisseur,
        ], 200);
    }




    public function supprimer(Request $request,$id){
        $fournisseur = Fournisseur::find($id);

        if (!$fournisseur) {
            return response()->json(['Message => fournisseur inexistante'],404);
       }
       $fournisseur->delete();
       return response()->json(['message' => 'fournisseur supprimée avec succès'], 200);
    }



    public function findByid(Request $request, $id)
    {
        $fournisseur = Fournisseur::find($id);

        if (!$fournisseur) {
            return response()->json(['Message => Fournisseur inexistante'], 404);
        }
        return response()->json($fournisseur, 200);
    }

}
