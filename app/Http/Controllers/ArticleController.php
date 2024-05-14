<?php

namespace App\Http\Controllers;

use App\Models\Article;


use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'suivi_stock' => 'required|string',
            'prix_achat' => 'required|integer',
            'dernier_prix_achat' => 'required|integer',
            'famille_id' => 'required|integer',
            'depot_id' => 'required|integer',
            'id_fournisseur' => 'required|integer',
            'reference' => 'nullable|string',
            'designation' => 'nullable|string',
            'unite_achat_vente' => 'nullable|string',
        ]);

        // Vérification si la référence existe déjà
        if ($request->reference) {
            $existingArticle = Article::where('reference', $request->reference)->first();
            if ($existingArticle) {
                return response()->json(['error' => 'La référence existe déjà'], 400);
            }
        }

        // Création de l'article
        $article = new Article;
        $article->suivi_stock = $request->suivi_stock;
        $article->prix_achat = $request->prix_achat;
        $article->dernier_prix_achat = $request->dernier_prix_achat;
        $article->famille_id = $request->famille_id;
        $article->depot_id = $request->depot_id;
        $article->id_fournisseur = $request->id_fournisseur;
        $article->reference = $request->reference;
        $article->designation = $request->designation;
        $article->unite_achat_vente = $request->unite_achat_vente;

        // Enregistrement dans la base de données
        $article->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'Article inséré avec succès'], 201);
    }





    public function getarticle()
    {
        $articles = Article::with(['famille', 'depot', 'fournisseur'])->get();

        // Transformez les IDs en noms dans chaque article
        $articles = $articles->map(function ($article) {
            return [
                'id' => $article->id,
                'suivi_stock' => $article->suivi_stock,
                'prix_achat' => $article->prix_achat,
                'dernier_prix_achat' => $article->dernier_prix_achat,
                'famille' => optional($article->famille)->intitule,
                'depot' => optional($article->depot)->nom,
                'fournisseur' => optional($article->fournisseur)->intitule,
                'reference' => $article->reference,
                'designation' => $article->designation,
                'unite_achat_vente' => $article->unite_achat_vente,
                'created_at' => $article->created_at,
                'updated_at' => $article->updated_at,
            ];
        });

        return response()->json($articles, 200);

    }







    public function updatearticle(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['Message => article inexistante'], 404);
        }

        $request->validate([
            'suivi_stock' => 'required|string',
            'prix_achat' => 'required|integer',
            'dernier_prix_achat' => 'required|integer',
            'famille_id' => 'required|integer',
            'depot_id' => 'required|integer',
            'id_fournisseur' => 'required|integer',
            'reference' => 'nullable|string',
            'designation' => 'nullable|string',
            'unite_achat_vente' => 'nullable|string',
        ]);

        // Création de l'article
        // $article = new Article;
        $article->suivi_stock = $request->suivi_stock;
        $article->prix_achat = $request->prix_achat;
        $article->dernier_prix_achat = $request->dernier_prix_achat;
        $article->famille_id = $request->famille_id;
        $article->depot_id = $request->depot_id;
        $article->id_fournisseur = $request->id_fournisseur;
        $article->reference = $request->reference;
        $article->designation = $request->designation;
        $article->unite_achat_vente = $request->unite_achat_vente;


        $article->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'article modifiée avec succès'], 200);
    }



    public function findByName($nom)
    {
        $article = Article::where('nom', $nom)->get();
        if (!$article) {
            return response()->json(['Message => articles inexistante'], 404);
        }
        return response()->json([
            "statut" => "success",
            "Data" => $article,
        ], 200);
    }



    public function findByid(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['Message => article inexistante'], 404);
        }
        return response()->json($article, 200);
    }


    public function supprimer(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['Message => article inexistante'], 404);
        }
        $article->delete();
        return response()->json(['message' => 'article supprimée avec succès'], 200);
    }


    public function countFamilles()
    {
        $count = Article::count();
        return response()->json($count);
    }
}
