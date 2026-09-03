<?php

namespace Database\Seeders;

use App\Models\ContentItem;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Tous les blocs de texte "narratifs" du site (titres, textes
     * d'introduction, chiffres clés), regroupés par page. Volontairement
     * hors périmètre pour l'instant : libellés de boutons/badges, listes
     * à puces très structurées (modules, critères), FAQ, pages légales —
     * laissées gérées dans le code car elles mêlent texte et mise en forme.
     */
    public function run(): void
    {
        $items = [
            // --- Accueil ---
            ['key' => 'home.hero.title', 'page' => 'accueil', 'label' => 'Titre principal (hero)', 'type' => 'text',
                'value' => 'Offrir une seconde chance à chaque chien recueilli, et lui trouver une famille responsable.'],
            ['key' => 'home.hero.lede', 'page' => 'accueil', 'label' => 'Texte sous le titre (hero)', 'type' => 'richtext',
                'value' => "Le Refuge Canin du Pays Rochefortais est une association Loi 1901 en cours de création en Charente-Maritime. Accueillir les chiens errants, abandonnés ou saisis n'est pas une fin en soi : c'est le moyen qui nous permet d'atteindre notre véritable objectif, une adoption réussie et durable."],
            ['key' => 'home.territoire.title', 'page' => 'accueil', 'label' => 'Titre — section "Le territoire"', 'type' => 'text',
                'value' => "Un territoire sans refuge, aujourd'hui dépendant d'une structure extérieure"],
            ['key' => 'home.territoire.text', 'page' => 'accueil', 'label' => 'Texte — section "Le territoire"', 'type' => 'richtext',
                'value' => "La Communauté d'Agglomération Rochefort Océan ne dispose d'aucun refuge sur son propre territoire. Les chiens trouvés errants sont aujourd'hui envoyés à la SPA de Saintes, à une trentaine de kilomètres."],
            ['key' => 'home.stat1.value', 'page' => 'accueil', 'label' => 'Chiffre clé 1 — valeur', 'type' => 'text', 'value' => '25 communes'],
            ['key' => 'home.stat1.label', 'page' => 'accueil', 'label' => 'Chiffre clé 1 — légende', 'type' => 'text',
                'value' => "membres de la Communauté d'Agglomération Rochefort Océan (CARO)"],
            ['key' => 'home.stat2.value', 'page' => 'accueil', 'label' => 'Chiffre clé 2 — valeur', 'type' => 'text', 'value' => '63 500 habitants'],
            ['key' => 'home.stat2.label', 'page' => 'accueil', 'label' => 'Chiffre clé 2 — légende', 'type' => 'text',
                'value' => 'sur 421 km² de territoire, sans refuge canin'],
            ['key' => 'home.stat3.value', 'page' => 'accueil', 'label' => 'Chiffre clé 3 — valeur', 'type' => 'text', 'value' => '≈ 30 km'],
            ['key' => 'home.stat3.label', 'page' => 'accueil', 'label' => 'Chiffre clé 3 — légende', 'type' => 'text',
                'value' => "jusqu'à la fourrière actuelle, la SPA de Saintes"],
            ['key' => 'home.mission.title', 'page' => 'accueil', 'label' => 'Titre — section "Notre mission"', 'type' => 'text',
                'value' => "Accueillir n'est que le moyen. L'adoption est la finalité."],
            ['key' => 'home.avancement.title', 'page' => 'accueil', 'label' => 'Titre — section "Avancement"', 'type' => 'text',
                'value' => "Un projet sérieux, pensé dès l'origine avec rigueur"],
            ['key' => 'home.avancement.text', 'page' => 'accueil', 'label' => 'Texte — section "Avancement"', 'type' => 'richtext',
                'value' => "Recherche de terrain, dossier réglementaire ICPE, financement en trois niveaux de certitude, calendrier réaliste : chaque étape du projet est documentée et transparente, pour donner confiance aux collectivités, aux donateurs et aux futurs bénévoles."],
            ['key' => 'home.cta.title', 'page' => 'accueil', 'label' => 'Titre — bandeau de soutien', 'type' => 'text',
                'value' => 'Ce refuge se construira avec vous'],
            ['key' => 'home.cta.text', 'page' => 'accueil', 'label' => 'Texte — bandeau de soutien', 'type' => 'richtext',
                'value' => "Bénévolat, dons, mécénat d'entreprise, signalement de foncier disponible : chaque forme de soutien rapproche le territoire de la CARO d'une solution locale et responsable."],
            ['key' => 'home.saisonnalite.text', 'page' => 'accueil', 'label' => 'Texte — encart affluence estivale (source : Gendarmerie nationale, 2021)', 'type' => 'richtext',
                'value' => "Cette pression est amplifiée l'été : sur l'Île-d'Aix par exemple, la population passe de 236 habitants permanents à 5 000 à 8 000 visiteurs par jour en pointe estivale — une affluence saisonnière qui accroît le risque de chiens égarés ou abandonnés sur le territoire."],
            ['key' => 'home.hero.image', 'page' => 'accueil', 'label' => 'Photo — le futur refuge (hero)', 'type' => 'image', 'value' => null],
            ['key' => 'home.terrain.image', 'page' => 'accueil', 'label' => 'Photo — le terrain', 'type' => 'image', 'value' => null],

            // --- Le projet ---
            ['key' => 'projet.hero.lede', 'page' => 'le-projet', 'label' => 'Texte sous le titre (hero)', 'type' => 'richtext',
                'value' => "Du constat territorial au choix des matériaux, chaque décision s'appuie sur le cadre réglementaire applicable aux fourrières et refuges — une exigence assumée dès l'origine."],
            ['key' => 'projet.constat.title', 'page' => 'le-projet', 'label' => 'Titre — section "Le constat"', 'type' => 'text',
                'value' => 'Aucune structure de refuge sur le territoire de la CARO'],
            ['key' => 'projet.constat.text1', 'page' => 'le-projet', 'label' => 'Texte 1 — section "Le constat"', 'type' => 'richtext',
                'value' => "Aujourd'hui, un chien trouvé errant sur le territoire de la Communauté d'Agglomération Rochefort Océan est envoyé à la SPA de Saintes, à une trentaine de kilomètres. Aucune structure de refuge n'existe sur le territoire de la CARO elle-même."],
            ['key' => 'projet.constat.text2', 'page' => 'le-projet', 'label' => 'Texte 2 — section "Le constat"', 'type' => 'richtext',
                'value' => "Deux refuges existent à proximité, mais hors périmètre CARO : le Refuge Oléronais, au Château-d'Oléron, et Les Murmures / ASPAC, à Châtelaillon-Plage. Ces deux communes dépendent d'autres intercommunalités."],
            ['key' => 'projet.cadre.title', 'page' => 'le-projet', 'label' => 'Titre — section "Le cadre légal"', 'type' => 'text',
                'value' => 'Pourquoi ce projet est juridiquement et localement pertinent'],
            ['key' => 'projet.terrain.title', 'page' => 'le-projet', 'label' => 'Titre — section "Le terrain"', 'type' => 'text',
                'value' => 'Un terrain agricole recherché en secteur rétro-littoral'],
            ['key' => 'projet.terrain.text', 'page' => 'le-projet', 'label' => 'Texte — section "Le terrain"', 'type' => 'richtext',
                'value' => "La recherche se concentre sur un terrain agricole (zone A du PLU) d'au moins 5 000 m², dans le secteur rétro-littoral de Fouras (secteur de Soumard) et de Saint-Laurent-de-la-Prée."],
            ['key' => 'projet.batiments.title', 'page' => 'le-projet', 'label' => 'Titre — section "Les bâtiments"', 'type' => 'text',
                'value' => 'Une ossature bois sur pieux vissés, adaptée au sol de marais'],
            ['key' => 'projet.batiments.text', 'page' => 'le-projet', 'label' => 'Texte — section "Les bâtiments"', 'type' => 'richtext',
                'value' => "Les bâtiments reposent sur des pieux métalliques vissés plutôt que sur une dalle béton, une adaptation au sol argileux de marais : structures surélevées de 30 à 50 cm, réversibles en fin de vie."],
            ['key' => 'projet.eco.title', 'page' => 'le-projet', 'label' => 'Titre — section "Construction écoresponsable"', 'type' => 'text',
                'value' => 'Du bois biosourcé, pas de dalle béton'],
            ['key' => 'projet.carte.image', 'page' => 'le-projet', 'label' => 'Photo — carte du territoire de la CARO', 'type' => 'image', 'value' => null],
            ['key' => 'projet.terrain.image', 'page' => 'le-projet', 'label' => 'Photo — le terrain recherché', 'type' => 'image', 'value' => null],
            ['key' => 'projet.batiments.image', 'page' => 'le-projet', 'label' => 'Photo — détail de l\'ossature bois', 'type' => 'image', 'value' => null],

            // --- Adoption ---
            ['key' => 'adoption.hero.lede', 'page' => 'adoption', 'label' => 'Texte sous le titre (hero)', 'type' => 'richtext',
                'value' => "Accueillir un animal n'est jamais une fin en soi. L'article 2 des statuts de l'association fixe l'objectif : lui trouver un foyer responsable, pour une adoption qui dure."],
            ['key' => 'adoption.warning.text', 'page' => 'adoption', 'label' => 'Texte — avertissement "refuge pas construit"', 'type' => 'richtext',
                'value' => "Cette page présente par avance le processus envisagé ; elle sera activée avec les premiers profils d'animaux dès l'ouverture du refuge."],
            ['key' => 'adoption.criteres.title', 'page' => 'adoption', 'label' => 'Titre — section "Critères"', 'type' => 'text',
                'value' => 'Ce que nous chercherons à vérifier'],
            ['key' => 'adoption.criteres.text', 'page' => 'adoption', 'label' => 'Texte — section "Critères"', 'type' => 'richtext',
                'value' => "Ces grandes lignes reflètent la philosophie du projet ; elles ne constituent pas encore un règlement définitif, qui sera validé par l'association à l'ouverture."],
            ['key' => 'adoption.preinscription.title', 'page' => 'adoption', 'label' => 'Titre — bloc pré-inscription', 'type' => 'text',
                'value' => "Soyez averti·e en priorité de l'ouverture des adoptions"],
            ['key' => 'adoption.preinscription.text', 'page' => 'adoption', 'label' => 'Texte — bloc pré-inscription', 'type' => 'richtext',
                'value' => 'Laissez votre email : nous vous préviendrons dès la mise en ligne des premiers profils de chiens à adopter.'],

            // --- Capacité & extensions ---
            ['key' => 'capacite.hero.title', 'page' => 'capacite-extensions', 'label' => 'Titre (hero)', 'type' => 'text',
                'value' => 'Une phase 1 dimensionnée, des extensions déjà réfléchies'],
            ['key' => 'capacite.phase1.title', 'page' => 'capacite-extensions', 'label' => 'Titre — section "Phase 1"', 'type' => 'text',
                'value' => 'Une capacité initiale de 10 à 12 chiens'],
            ['key' => 'capacite.extensions.title', 'page' => 'capacite-extensions', 'label' => 'Titre — section "À moyen terme"', 'type' => 'text',
                'value' => "Des pistes d'extension déjà identifiées"],
            ['key' => 'capacite.extensions.text', 'page' => 'capacite-extensions', 'label' => 'Texte — section "À moyen terme"', 'type' => 'richtext',
                'value' => "Une fois la phase 1 stabilisée, plusieurs pistes de développement sont envisagées pour le refuge et son rôle sur le territoire."],

            // --- Financement ---
            ['key' => 'financement.hero.lede', 'page' => 'financement', 'label' => 'Texte sous le titre (hero)', 'type' => 'richtext',
                'value' => "Plutôt que d'annoncer un plan de financement figé, nous distinguons ce qui est quasi maîtrisable, ce qui reste à négocier, et ce qui relève de démarches compétitives et incertaines."],

            // --- Budget & calendrier ---
            ['key' => 'budget.montant.title', 'page' => 'budget-calendrier', 'label' => 'Titre — montant du budget', 'type' => 'text',
                'value' => '140 000 € à 200 000 €+ TTC'],
            ['key' => 'budget.calendrier.title', 'page' => 'budget-calendrier', 'label' => 'Titre — section "Calendrier"', 'type' => 'text',
                'value' => "De la constitution juridique à l'ouverture"],

            // --- Nous soutenir ---
            ['key' => 'soutenir.hero.title', 'page' => 'nous-soutenir', 'label' => 'Titre (hero)', 'type' => 'text',
                'value' => 'Trois façons de faire avancer le projet'],
            ['key' => 'soutenir.don.title', 'page' => 'nous-soutenir', 'label' => 'Titre — section "Faire un don"', 'type' => 'text',
                'value' => 'Une plateforme de don sécurisée, bientôt disponible'],
            ['key' => 'soutenir.don.text', 'page' => 'nous-soutenir', 'label' => 'Texte — section "Faire un don"', 'type' => 'richtext',
                'value' => "La collecte de dons en ligne sera assurée via HelloAsso. L'intégration est en attente de mise en place."],
            ['key' => 'soutenir.benevolat.title', 'page' => 'nous-soutenir', 'label' => 'Titre — section "Bénévolat"', 'type' => 'text',
                'value' => 'Donner de son temps, au bureau ou sur le terrain'],
            ['key' => 'soutenir.benevolat.text', 'page' => 'nous-soutenir', 'label' => 'Texte — section "Bénévolat"', 'type' => 'richtext',
                'value' => "L'association se construit aussi grâce à l'engagement de ses bénévoles : gouvernance (bureau, conseil d'administration), communication, événements, ou aide administrative."],
            ['key' => 'soutenir.foncier.title', 'page' => 'nous-soutenir', 'label' => 'Titre — section "Foncier"', 'type' => 'text',
                'value' => 'Vous connaissez un terrain disponible ?'],
            ['key' => 'soutenir.foncier.text', 'page' => 'nous-soutenir', 'label' => 'Texte — section "Foncier"', 'type' => 'richtext',
                'value' => "Terrain agricole (zone A du PLU) d'au moins 5 000 m², secteur de Fouras (Soumard) ou de Saint-Laurent-de-la-Prée : faites-le nous savoir."],
        ];

        // On ne réécrit jamais "value" pour un content_item déjà existant : un
        // admin a pu le personnaliser (texte modifié, image uploadée) depuis
        // le seed initial, et relancer ce seeder ne doit jamais l'écraser.
        foreach ($items as $item) {
            $existing = ContentItem::where('content_key', $item['key'])->first();

            if ($existing) {
                $existing->update([
                    'page' => $item['page'],
                    'label' => $item['label'],
                    'type' => $item['type'],
                ]);

                continue;
            }

            ContentItem::create([
                'content_key' => $item['key'],
                'page' => $item['page'],
                'label' => $item['label'],
                'type' => $item['type'],
                'value' => $item['value'],
            ]);
        }
    }
}
