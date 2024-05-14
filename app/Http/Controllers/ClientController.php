<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
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

        $existingClient = Client::where('compte_tiers', $request->compte_tiers)->first();
    if ($existingClient) {
        return response()->json(['message' => 'Le compte tiers existe déjà'], 400);
    }            $existingClient = Client::where('telephone', $request->telephone)->first();
    if ($existingClient) {
        return response()->json(['message' => 'Le telephone existe déjà'], 400);
    }
        $existingClient = Client::where('email', $request->email)->first();
    if ($existingClient) {
        return response()->json(['message' => 'Le email existe déjà'], 400);
    }

    // Créer une nouvelle instance du modèle Client
    $client = new Client;

    $client->compte_tiers = $request->compte_tiers;
    $client->intitule = $request->intitule;
    $client->adresse = $request->adresse;
    $client->complement = $request->complement;
    $client->region = $request->region;
    $client->ville = $request->ville;
    $client->pays = $request->pays;
    $client->telephone = $request->telephone;
    $client->email = $request->email;
    $client->code_postal  = $request->code_postal ;
    $client->ninea = $request->ninea;

    // Enregistrement dans la base de données
    $client->save();

    // Retourner une réponse appropriée
    return response()->json(['message' => 'Client(e) inséré(e) avec succès'], 201);
}



    public function getClient(){
        $client = Client::all();
        return response()->json($client, 200);

    }



    public function updateClient(Request $request,$id){
        $client = Client::find($id);

        if (!$client) {
             return response()->json(['Message => client inexistant'],404);
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

        $client->compte_tiers = $request->compte_tiers;
        $client->intitule = $request->intitule;
        $client->adresse = $request->adresse;
        $client->complement = $request->complement;
        $client->region = $request->region;
        $client->ville = $request->ville;
        $client->pays = $request->pays;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        $client->code_postal  = $request->code_postal ;
        $client->ninea = $request->ninea;


        $client->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'client modifiée avec succès'], 200);
    }



    public function findByid(Request $request, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['Message => client inexistante'], 404);
        }
        return response()->json($client, 200);
    }


    public function findByName($intitule)
    {
        $client = Client::where('intitule', $intitule)->first();
        if (!$client) {
            return response()->json(['Message => cli$client inexistant'], 404);
        }
        return response()->json([
            "statut" => "success",
            "Data" => $client,
        ], 200);
    }


    public function supprimer(Request $request,$id){
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['Message => client inexistante'],404);
       }
       $client->delete();
       return response()->json(['message' => 'client supprimée avec succès'], 200);
    }

    public function countFamilles()
    {
        $count = Client::count();
        return response()->json($count);
    }
}
