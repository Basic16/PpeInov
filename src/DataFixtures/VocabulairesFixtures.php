<?php

namespace App\DataFixtures;

use App\Entity\Abonnement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Categorie;
use App\Entity\Theme;
use App\Entity\Vocabulaire;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class VocabulairesFixtures extends Fixture
{

    private $manager;
    private $faker;


    public function __construct()
    {
        $this->faker = Factory::create("fr_FR");
    }
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $vocabulaires =
            [
                // Fruits
                1 => [
                    'libelle' => 'Cerise',
                    'libelle_en' => 'Cherry'

                ],
                2 => [
                    'libelle' => 'Banane',
                    'libelle_en' => 'Banana'
                ],
                3 => [
                    'libelle' => 'Pomme',
                    'libelle_en' => 'Apple'
                ],
                4 => [
                    'libelle' => 'Abricot',
                    'libelle_en' => 'Apricot'
                ],
                5 => [
                    'libelle' => 'Poire',
                    'libelle_en' => 'Pear'
                ],
                6 => [
                    'libelle' => 'Pêche',
                    'libelle_en' => 'Peach'
                ],
                7 => [
                    'libelle' => 'Prune',
                    'libelle_en' => 'Plum'
                ],
                8 => [
                    'libelle' => 'Pastèque',
                    'libelle_en' => 'Watermelon'
                ],
                9 => [
                    'libelle' => 'Melon',
                    'libelle_en' => 'Melon'
                ],
                10 => [
                    'libelle' => 'Piment',
                    'libelle_en' => 'Chilli peppers'
                ],
                11 => [
                    'libelle' => 'Courgette',
                    'libelle_en' => 'Courgette'
                ],
                12 => [
                    'libelle' => 'Concombre',
                    'libelle_en' => 'Cocumber'
                ],
                13 => [
                    'libelle' => 'Cornichon',
                    'libelle_en' => 'Pickle'
                ],
                14 => [
                    'libelle' => 'Aubergine',
                    'libelle_en' => 'Eggplant'
                ],
                15 => [
                    'libelle' => 'Citrouille',
                    'libelle_en' => 'Pumpkin'
                ],
                16 => [
                    'libelle' => 'Tomate',
                    'libelle_en' => 'Tomato'
                ],
                17 => [
                    'libelle' => 'Orange',
                    'libelle_en' => 'Orange'
                ],
                18 => [
                    'libelle' => 'Citron',
                    'libelle_en' => 'Lemon'
                ],
                19 => [
                    'libelle' => 'Citron vert',
                    'libelle_en' => 'Lime'
                ],
                20 => [
                    'libelle' => 'Kumquat',
                    'libelle_en' => 'Kumquat'
                ],
                21 => [
                    'libelle' => 'Pamplemousse',
                    'libelle_en' => 'Grapefruit'
                ],
                22 => [
                    'libelle' => 'Mûre',
                    'libelle_en' => 'Blackberry'
                ],
                23 => [
                    'libelle' => 'Myrtille',
                    'libelle_en' => 'Blueberry'
                ],
                24 => [
                    'libelle' => 'Canneberge',
                    'libelle_en' => 'Cranberry'
                ],
                25 => [
                    'libelle' => 'Groseille',
                    'libelle_en' => 'Gooseberry'
                ],
                26 => [
                    'libelle' => 'Framboise',
                    'libelle_en' => 'Raspeberry'
                ],
                27 => [
                    'libelle' => 'Fraise',
                    'libelle_en' => 'Strawberry'
                ],
                28 => [
                    'libelle' => 'Cassis',
                    'libelle_en' => 'Blackcurrant'
                ],
                29 => [
                    'libelle' => 'Groseille rouge',
                    'libelle_en' => 'Redcurrant'
                ],
                30 => [
                    'libelle' => 'Kiwi',
                    'libelle_en' => 'Kiwi'
                ],
                31 => [
                    'libelle' => 'Papaye',
                    'libelle_en' => 'Papaya'
                ],
                32 => [
                    'libelle' => 'FRuit du dragon/Pitaya',
                    'libelle_en' => 'Dragonfruit'
                ],
                33 => [
                    'libelle' => 'Mangue',
                    'libelle_en' => 'Mango'
                ],
                34 => [
                    'libelle' => 'Ananas',
                    'libelle_en' => 'Pineapple'
                ],
                35 => [
                    'libelle' => 'Figue',
                    'libelle_en' => 'Fig'
                ],
                36 => [
                    'libelle' => 'Litchi',
                    'libelle_en' => 'Lychee'
                ],
                37 => [
                    'libelle' => 'Noix de coco',
                    'libelle_en' => 'Coconut'
                ],
                38 => [
                    'libelle' => 'Grenade',
                    'libelle_en' => 'Pomegranate'
                ],
                39 => [
                    'libelle' => 'Figue de barbarie',
                    'libelle_en' => 'Prickly pear'
                ],
                40 => [
                    'libelle' => 'Fruit de la passion',
                    'libelle_en' => 'Passion fruit'
                ],

                // Couleurs
                41 => [
                    'libelle' => 'Blanc',
                    'libelle_en' => 'White'
                ],
                42 => [
                    'libelle' => 'Gris',
                    'libelle_en' => 'Grey'
                ],
                43 => [
                    'libelle' => 'Noir',
                    'libelle_en' => 'Black'
                ],
                44 => [
                    'libelle' => 'Rouge',
                    'libelle_en' => 'Red'
                ],
                45 => [
                    'libelle' => 'Orange',
                    'libelle_en' => 'Orange'
                ],
                46 => [
                    'libelle' => 'Jaune',
                    'libelle_en' => 'Yellow'
                ],
                47 => [
                    'libelle' => 'Vert',
                    'libelle_en' => 'Green'
                ],
                48 => [
                    'libelle' => 'Bleu',
                    'libelle_en' => 'Blue'
                ],
                49 => [
                    'libelle' => 'Violet',
                    'libelle_en' => 'Purple'
                ],
                50 => [
                    'libelle' => 'Marron',
                    'libelle_en' => 'Brown'
                ],
                51 => [
                    'libelle' => 'Rose',
                    'libelle_en' => 'Pink'
                ],
                52 => [
                    'libelle' => 'Cyan',
                    'libelle_en' => 'Cyan'
                ],
                53 => [
                    'libelle' => 'Magenta',
                    'libelle_en' => 'Magenta'
                ],
                54 => [
                    'libelle' => 'Fuschia',
                    'libelle_en' => 'Fuschia'
                ],
                55 => [
                    'libelle' => 'Or',
                    'libelle_en' => 'Gold'
                ],
                56 => [
                    'libelle' => 'Argent',
                    'libelle_en' => 'Silver'
                ],
                57 => [
                    'libelle' => 'Clair',
                    'libelle_en' => 'Light'
                ],
                58 => [
                    'libelle' => 'Foncé',
                    'libelle_en' => 'Dark'
                ],

                //Sports
                60 => [
                    'libelle' => "Tir a l'arc",
                    'libelle_en' => 'Archery'
                ],
                61 => [
                    'libelle' => 'Athlétisme',
                    'libelle_en' => 'Athletics'
                ],
                62 => [
                    'libelle' => '100 mètres',
                    'libelle_en' => '100 metre'
                ],
                63 => [
                    'libelle' => '110 mètres haies',
                    'libelle_en' => '110 metre hurdles'
                ],
                64 => [
                    'libelle' => 'Cyclisme',
                    'libelle_en' => 'Cycling'
                ],
                65 => [
                    'libelle' => 'Football',
                    'libelle_en' => 'Football'
                ],
                66 => [
                    'libelle' => 'Handball',
                    'libelle_en' => 'Handball'
                ],
                67 => [
                    'libelle' => 'Basket-ball',
                    'libelle_en' => 'Basketball'
                ],
                68 => [
                    'libelle' => 'Boxe',
                    'libelle_en' => 'Boxing'
                ],
                69 => [
                    'libelle' => 'Escalade',
                    'libelle_en' => 'Climbing'
                ],
                70 => [
                    'libelle' => 'Danse',
                    'libelle_en' => 'Dancing'
                ],
                71 => [
                    'libelle' => 'Plongeon',
                    'libelle_en' => 'Diving'
                ],
                72 => [
                    'libelle' => 'Lancer du disque',
                    'libelle_en' => 'Discus Throw'
                ],
                73 => [
                    'libelle' => 'Fléchettes',
                    'libelle_en' => 'Darts'
                ],
                74 => [
                    'libelle' => 'Equitation',
                    'libelle_en' => 'Horse Riding'
                ],
                75 => [
                    'libelle' => 'Escrime',
                    'libelle_en' => 'Fencing'
                ],
                76 => [
                    'libelle' => 'Patinage Artistique',
                    'libelle_en' => 'Figure Skating'
                ],
                77 => [
                    'libelle' => 'Golf',
                    'libelle_en' => 'Golf'
                ],
                78 => [
                    'libelle' => 'Saut en hauteur',
                    'libelle_en' => 'High Jump'
                ],
                79 => [
                    'libelle' => 'Hockey sur Glace',
                    'libelle_en' => 'Ice Hockey'
                ],
                80 => [
                    'libelle' => 'Futsal',
                    'libelle_en' => 'Indoor Soccer'
                ],
                81 => [
                    'libelle' => 'Lancer de javelot',
                    'libelle_en' => 'Javelin Throw'
                ],
                82 => [
                    'libelle' => 'Saut en Longueur',
                    'libelle_en' => 'Long Jump'
                ],
                83 => [
                    'libelle' => 'Marathon',
                    'libelle_en' => 'Marathon'
                ],
                84 => [
                    'libelle' => 'Alpinisme',
                    'libelle_en' => 'Mountain Climbing'
                ],
                85 => [
                    'libelle' => 'Jeux Olympiques',
                    'libelle_en' => 'Olympic Game'
                ],
                86 => [
                    'libelle' => 'Rugby',
                    'libelle_en' => 'Rugby'
                ],
                87 => [
                    'libelle' => 'Aviron',
                    'libelle_en' => 'Rowing Soccer'
                ],
                88 => [
                    'libelle' => 'Voile',
                    'libelle_en' => 'Sailing'
                ],
                89 => [
                    'libelle' => 'Saut à Ski',
                    'libelle_en' => 'Ski Jumping'
                ],
                90 => [
                    'libelle' => 'Natation',
                    'libelle_en' => 'Swimming'
                ],
                91 => [
                    'libelle' => 'Tennis de Table',
                    'libelle_en' => 'Table Tennis'
                ],
                92 => [
                    'libelle' => 'Tir à la corde',
                    'libelle_en' => 'Tug of War'
                ],
                93 => [
                    'libelle' => 'Catch',
                    'libelle_en' => 'Wrestling'
                ],
                94 => [
                    'libelle' => 'Judo',
                    'libelle_en' => 'Judo'
                ],
                95 => [
                    'libelle' => 'Culturisme',
                    'libelle_en' => 'Bodybuilding'
                ],
                96 => [
                    'libelle' => 'Compétition automobile',
                    'libelle_en' => 'Auto Racing'
                ],

                //Maison
                100 => [
                    'libelle' => 'Maison',
                    'libelle_en' => 'House'
                ],
                101 => [
                    'libelle' => 'Appartement',
                    'libelle_en' => 'Flat'
                ],
                102 => [
                    'libelle' => 'Cuisine',
                    'libelle_en' => 'Kitchen'
                ],
                103 => [
                    'libelle' => 'Salle à manger',
                    'libelle_en' => 'Dining room'
                ],
                104 => [
                    'libelle' => 'Salle de bain',
                    'libelle_en' => 'Bathroom'
                ],
                105 => [
                    'libelle' => 'Toilettes',
                    'libelle_en' => 'Restroom'
                ],
                106 => [
                    'libelle' => 'Chambre',
                    'libelle_en' => 'Bedroom'
                ],
                107 => [
                    'libelle' => 'Salon',
                    'libelle_en' => 'Living room'
                ],
                108 => [
                    'libelle' => 'Grenier',
                    'libelle_en' => 'Attic'
                ],
                109 => [
                    'libelle' => 'Sous-sol',
                    'libelle_en' => 'Basement'
                ],
                110 => [
                    'libelle' => 'Fenêtre',
                    'libelle_en' => 'Window'
                ],
                111 => [
                    'libelle' => 'Porte',
                    'libelle_en' => 'Door'
                ],
                112 => [
                    'libelle' => 'Mur',
                    'libelle_en' => 'Wall'
                ],
                113 => [
                    'libelle' => 'Toît',
                    'libelle_en' => 'Roof'
                ],
                114 => [
                    'libelle' => 'Volets',
                    'libelle_en' => 'Shudders'
                ],
                115 => [
                    'libelle' => 'Lit',
                    'libelle_en' => 'Bed'
                ],
                116 => [
                    'libelle' => 'Matelas',
                    'libelle_en' => 'Mattress'
                ],
                117 => [
                    'libelle' => 'Sommier',
                    'libelle_en' => 'Bed Base'
                ],
                118 => [
                    'libelle' => 'Oreiller',
                    'libelle_en' => 'Pillow'
                ],
                119 => [
                    'libelle' => 'Couverture',
                    'libelle_en' => 'Blanket'
                ],
                120 => [
                    'libelle' => 'Couette',
                    'libelle_en' => 'Duvet'
                ],
                121 => [
                    'libelle' => 'Réveil',
                    'libelle_en' => 'Alarm Clock'
                ],
                122 => [
                    'libelle' => 'Robe de chambre',
                    'libelle_en' => 'Dressing Gown'
                ],
                123 => [
                    'libelle' => 'Chaussons / Pantoufles',
                    'libelle_en' => 'Slippers'
                ],
                124 => [
                    'libelle' => 'Pyjama',
                    'libelle_en' => 'Pyjamas'
                ],
                125 => [
                    'libelle' => 'Tapis',
                    'libelle_en' => 'Rug'
                ],
                126 => [
                    'libelle' => 'Rideaux',
                    'libelle_en' => 'Curtains'
                ],
                127 => [
                    'libelle' => 'Miroir',
                    'libelle_en' => 'Mirror'
                ],
                128 => [
                    'libelle' => 'Cadre',
                    'libelle_en' => 'Frame'
                ],
                129 => [
                    'libelle' => 'Commode',
                    'libelle_en' => 'Chest of Drawers'
                ],
                130 => [
                    'libelle' => 'Cadre',
                    'libelle_en' => 'Frame'
                ],
                131 => [
                    'libelle' => 'Penderie / Armoire',
                    'libelle_en' => 'Wardrobe'
                ],
                132 => [
                    'libelle' => 'Placard',
                    'libelle_en' => 'Closet'
                ],
                133 => [
                    'libelle' => 'Tiroir',
                    'libelle_en' => 'Drawer'
                ],
                134 => [
                    'libelle' => 'Cintre',
                    'libelle_en' => 'Hanger'
                ],
                135 => [
                    'libelle' => 'Papier Peint',
                    'libelle_en' => 'Wallpaper'
                ],
                136 => [
                    'libelle' => 'Bureau',
                    'libelle_en' => 'Desk'
                ],
                137 => [
                    'libelle' => 'Chaise',
                    'libelle_en' => 'Chair'
                ],
                138 => [
                    'libelle' => 'Etagères',
                    'libelle_en' => 'Shelves'
                ],
                139 => [
                    'libelle' => 'Bibliothèque',
                    'libelle_en' => 'Bookshelf'
                ],
                140 => [
                    'libelle' => 'Lampe',
                    'libelle_en' => 'Lamp'
                ],
                141 => [
                    'libelle' => 'Livre',
                    'libelle_en' => 'Book'
                ],
                142 => [
                    'libelle' => 'Ordinateur',
                    'libelle_en' => 'Computer'
                ],
                143 => [
                    'libelle' => 'Boite',
                    'libelle_en' => 'Box'
                ],
                144 => [
                    'libelle' => 'Stylo',
                    'libelle_en' => 'Pen'
                ],
                145 => [
                    'libelle' => 'Sofa/Canapé',
                    'libelle_en' => 'Sofa'
                ],
                146 => [
                    'libelle' => 'Téléphone',
                    'libelle_en' => 'Phone'
                ],
                147 => [
                    'libelle' => 'Télévision',
                    'libelle_en' => 'Television'
                ],
                148 => [
                    'libelle' => 'Baignoire',
                    'libelle_en' => 'Bathtub'
                ],
                149 => [
                    'libelle' => 'Douche',
                    'libelle_en' => 'Shower'
                ],
                150 => [
                    'libelle' => 'Savon',
                    'libelle_en' => 'Soap'
                ],
                151 => [
                    'libelle' => 'Serviette',
                    'libelle_en' => 'Towel'
                ],
                152 => [
                    'libelle' => 'Shampoing',
                    'libelle_en' => 'Shampoo'
                ],
                153 => [
                    'libelle' => 'Casserolle',
                    'libelle_en' => 'Saucepan'
                ],
                154 => [
                    'libelle' => 'Cuisinière',
                    'libelle_en' => 'Cooker'
                ],
                155 => [
                    'libelle' => 'Four',
                    'libelle_en' => 'Oven'
                ],
                156 => [
                    'libelle' => 'Lave-vaisselle',
                    'libelle_en' => 'Dishwasher'
                ],
                157 => [
                    'libelle' => 'Micro-ondes',
                    'libelle_en' => 'Microwave'
                ],
                158 => [
                    'libelle' => 'Poêle',
                    'libelle_en' => 'Pan'
                ],
                159 => [
                    'libelle' => 'Assiettes',
                    'libelle_en' => 'Plate'
                ],
                160 => [
                    'libelle' => 'Cuillère',
                    'libelle_en' => 'Spoon'
                ],
                161 => [
                    'libelle' => 'Couverts',
                    'libelle_en' => 'Cutlery'
                ],
                162 => [
                    'libelle' => 'Nappe',
                    'libelle_en' => 'Tablecloth'
                ],
                163 => [
                    'libelle' => 'Table',
                    'libelle_en' => 'Table'
                ],
                164 => [
                    'libelle' => 'Verre',
                    'libelle_en' => 'Glass'
                ],
                165 => [
                    'libelle' => 'Cadre',
                    'libelle_en' => 'Frame'
                ],

                //Coprs HUmain
                170 => [
                    'libelle' => 'poumons',
                    'libelle_en' => 'lungs'
                ],
                171 => [
                    'libelle' => 'coeur',
                    'libelle_en' => 'heart'
                ],
                172 => [
                    'libelle' => 'foie',
                    'libelle_en' => 'liver'
                ],
                173 => [
                    'libelle' => 'estomac',
                    'libelle_en' => 'stomach'
                ],
                174 => [
                    'libelle' => 'rein',
                    'libelle_en' => 'kidney'
                ],
                175 => [
                    'libelle' => 'tête',
                    'libelle_en' => 'head'
                ],
                176 => [
                    'libelle' => 'cou',
                    'libelle_en' => 'neck'
                ],
                177 => [
                    'libelle' => 'épaule',
                    'libelle_en' => 'shoulder'
                ],
                178 => [
                    'libelle' => 'main',
                    'libelle_en' => 'hand'
                ],
                179 => [
                    'libelle' => 'doigt',
                    'libelle_en' => 'finger'
                ],
                180 => [
                    'libelle' => 'genou',
                    'libelle_en' => 'knee'
                ],
                181 => [
                    'libelle' => 'foot',
                    'libelle_en' => 'pied'
                ],
                182 => [
                    'libelle' => 'cheveux',
                    'libelle_en' => 'hair'
                ],
                183 => [
                    'libelle' => 'sourcils',
                    'libelle_en' => 'eyebrows'
                ],
                184 => [
                    'libelle' => 'yeux',
                    'libelle_en' => 'eyes'
                ],
                185 => [
                    'libelle' => 'cils',
                    'libelle_en' => 'eyelashes'
                ],
                186 => [
                    'libelle' => 'nez',
                    'libelle_en' => 'nose'
                ],
                187 => [
                    'libelle' => 'bouche',
                    'libelle_en' => 'mouth'
                ],
                188 => [
                    'libelle' => 'lèvres',
                    'libelle_en' => 'lips'
                ],
                189 => [
                    'libelle' => 'menton',
                    'libelle_en' => 'chin'
                ],
                190 => [
                    'libelle' => 'cheek',
                    'libelle_en' => 'joue'
                ],
                191 => [
                    'libelle' => 'oreille',
                    'libelle_en' => 'ear'
                ],
                192 => [
                    'libelle' => 'gorge',
                    'libelle_en' => 'throat'
                ],
                193 => [
                    'libelle' => 'crâne',
                    'libelle_en' => 'skull'
                ],
                194 => [
                    'libelle' => 'mâchoire',
                    'libelle_en' => 'jawline'
                ],
                195 => [
                    'libelle' => 'barbe',
                    'libelle_en' => 'beard'
                ],
                196 => [
                    'libelle' => 'dos',
                    'libelle_en' => 'back'
                ],
                197 => [
                    'libelle' => 'avant-bras',
                    'libelle_en' => 'forearm'
                ],
                198 => [
                    'libelle' => 'mollet',
                    'libelle_en' => 'calve'
                ],
                199 => [
                    'libelle' => 'sang',
                    'libelle_en' => 'blood'
                ],
                200 => [
                    'libelle' => 'transpiration',
                    'libelle_en' => 'sweat'
                ],



                //Ecole
                210 => [
                    'libelle' => 'Maitresse / Professeur',
                    'libelle_en' => 'Teacher'
                ],
                211 => [
                    'libelle' => 'Head Teacher',
                    'libelle_en' => 'Directeur'
                ],
                212 => [
                    'libelle' => 'Elève',
                    'libelle_en' => 'Pupil'
                ],
                213 => [
                    'libelle' => 'Etudiant',
                    'libelle_en' => 'Student'
                ],
                214 => [
                    'libelle' => 'Camarade de classe',
                    'libelle_en' => 'School Friend'
                ],
                215 => [
                    'libelle' => 'Trimestre',
                    'libelle_en' => 'Term'
                ],
                216 => [
                    'libelle' => 'Emploi du temp',
                    'libelle_en' => 'Timetable'
                ],
                217 => [
                    'libelle' => 'Leçon',
                    'libelle_en' => 'Lesson'
                ],
                218 => [
                    'libelle' => 'Cours',
                    'libelle_en' => 'Period'
                ],
                219 => [
                    'libelle' => 'Heure de permanence',
                    'libelle_en' => 'Free period'
                ],
                220 => [
                    'libelle' => 'Salle de classe',
                    'libelle_en' => 'Classroom'
                ],
                221 => [
                    'libelle' => 'Devoirs',
                    'libelle_en' => 'Homework'
                ],
                222 => [
                    'libelle' => 'Exercice',
                    'libelle_en' => 'Exercise'
                ],
                223 => [
                    'libelle' => 'Problème',
                    'libelle_en' => 'Problem'
                ],
                224 => [
                    'libelle' => 'Réponse',
                    'libelle_en' => 'Answer'
                ],
                225 => [
                    'libelle' => 'Interrogation',
                    'libelle_en' => 'Test'
                ],
                226 => [
                    'libelle' => 'Interrogation Ecrite',
                    'libelle_en' => 'Written Test'
                ],
                227 => [
                    'libelle' => 'Rédaction',
                    'libelle_en' => 'Essay'
                ],
                228 => [
                    'libelle' => 'Faute',
                    'libelle_en' => 'Mistake'
                ],
                229 => [
                    'libelle' => 'Note',
                    'libelle_en' => 'Mark'
                ],
                230 => [
                    'libelle' => 'Moyenne',
                    'libelle_en' => 'Pass Mark'
                ],
                231 => [
                    'libelle' => 'Résultat',
                    'libelle_en' => 'Result'
                ],
                232 => [
                    'libelle' => 'Bulletin de notes',
                    'libelle_en' => 'School Report'
                ],
                233 => [
                    'libelle' => 'Certificat',
                    'libelle_en' => 'Certificate'
                ],
                234 => [
                    'libelle' => 'Diplôme',
                    'libelle_en' => 'Diploma'
                ],
                235 => [
                    'libelle' => 'Récréation',
                    'libelle_en' => 'Break'
                ],
                236 => [
                    'libelle' => 'Retenue',
                    'libelle_en' => 'Detention'
                ],
                237 => [
                    'libelle' => 'Punition',
                    'libelle_en' => 'Punishment'
                ],
                238 => [
                    'libelle' => 'Vacances Scolaires',
                    'libelle_en' => 'School Holidays'
                ],
                239 => [
                    'libelle' => 'Petites Vacances',
                    'libelle_en' => 'Half Term'
                ],
                240 => [
                    'libelle' => "Vacances d'été",
                    'libelle_en' => 'Summer Holidays'
                ],
                241 => [
                    'libelle' => 'Vacances de Noël',
                    'libelle_en' => 'Christmas holidays'
                ],
                242 => [
                    'libelle' => 'Vacances de Pâques',
                    'libelle_en' => 'Easter Holidays'
                ],
                243 => [
                    'libelle' => 'Cours Magistral',
                    'libelle_en' => 'Lecture'
                ],
                244 => [
                    'libelle' => 'Travaux Dirigés',
                    'libelle_en' => 'Tutorial'
                ],
                245 => [
                    'libelle' => "Professeur d'université",
                    'libelle_en' => 'Professor'
                ],
                246 => [
                    'libelle' => 'Amphithéâtre',
                    'libelle_en' => 'Lecture Hall'
                ],
                247 => [
                    'libelle' => 'Foyer des Etudiant',
                    'libelle_en' => "Students' Union"
                ],
                248 => [
                    'libelle' => 'Mémoire / Thèse',
                    'libelle_en' => 'Dissertation'
                ],
                249 => [
                    'libelle' => 'Equivalent de la licence',
                    'libelle_en' => "Bachelor's Degree"
                ],
                250 => [
                    'libelle' => 'Equivalent de la maîtrise',
                    'libelle_en' => 'Master degree'
                ],
                251 => [
                    'libelle' => 'Equivalent du doctorat',
                    'libelle_en' => 'Master PhD'
                ],




                //Informatique
                261 => [
                    'libelle' => 'Matériel Informatique',
                    'libelle_en' => 'Hardware'
                ],
                262 => [
                    'libelle' => 'Ordinateur de bureau',
                    'libelle_en' => 'Computer'
                ],
                263 => [
                    'libelle' => 'Ordinateur Portable',
                    'libelle_en' => 'Laptop'
                ],
                264 => [
                    'libelle' => 'Ecran',
                    'libelle_en' => 'Screen'
                ],
                265 => [
                    'libelle' => 'Clavier',
                    'libelle_en' => 'Keyborad'
                ],
                266 => [
                    'libelle' => 'Touche',
                    'libelle_en' => 'Key'
                ],
                267 => [
                    'libelle' => 'Souris',
                    'libelle_en' => 'Mouse'
                ],
                268 => [
                    'libelle' => 'Tapis de souris',
                    'libelle_en' => 'Mouse Pad'
                ],
                269 => [
                    'libelle' => 'Imprimante',
                    'libelle_en' => 'Printer'
                ],
                270 => [
                    'libelle' => 'Scanner',
                    'libelle_en' => 'Scanner'
                ],
                271 => [
                   'libelle' => 'Disque Dur',
                    'libelle_en' => 'Hard Disk'
                ],
                272 => [
                    'libelle' => 'Lecteur CD',
                    'libelle_en' => 'CD Drive'
                ],
                273 => [
                    'libelle' => 'Fenêtre',
                    'libelle_en' => 'Window'
                ],
                274 => [
                    'libelle' => 'Page',
                    'libelle_en' => 'Page'
                ],
                275 => [
                    'libelle' => 'Curseur',
                    'libelle_en' => 'Cursor'
                ],
                276 => [
                    'libelle' => 'Mot de passe',
                    'libelle_en' => 'Password'
                ],
                277 => [
                    'libelle' => 'Programme',
                    'libelle_en' => 'Program'
                ],
                278 => [
                    'libelle' => 'Application',
                    'libelle_en' => 'Application'
                ],
                279 => [
                    'libelle' => 'Fichier',
                    'libelle_en' => 'File'
                ],
                280 => [
                    'libelle' => 'Repertoire',
                    'libelle_en' => 'Folder'
                ],
                281 => [
                    'libelle' => 'Logiciel',
                    'libelle_en' => 'Software'
                ],
                282 => [
                    'libelle' => 'Corbeille',
                    'libelle_en' => 'Thrash'
                ],
                283 => [
                    'libelle' => 'Sélectionner',
                    'libelle_en' => 'Select'
                ],
                284 => [
                    'libelle' => 'Installer',
                    'libelle_en' => 'Install'
                ],
                285 => [
                    'libelle' => 'Copier',
                    'libelle_en' => 'Copy'
                ],
                286 => [
                    'libelle' => 'Coller',
                    'libelle_en' => 'Paste'
                ],
                287 => [
                    'libelle' => 'Couper',
                    'libelle_en' => 'Cut'
                ],
                288 => [
                    'libelle' => 'Effacer',
                    'libelle_en' => 'Delete'
                ],
                289 => [
                    'libelle' => 'Imprimer',
                    'libelle_en' => 'To Print'
                ],
                290 => [
                    'libelle' => 'Numériser',
                    'libelle_en' => 'To Scan'
                ],
                291 => [
                    'libelle' => 'Réseau',
                    'libelle_en' => 'Network'
                ],
                292 => [
                    'libelle' => 'Navigateur',
                    'libelle_en' => 'Browser'
                ],
                293 => [
                    'libelle' => 'Moteur de recherche',
                    'libelle_en' => 'Search Engine'
                ],
                294 => [
                    'libelle' => 'Serveur',
                    'libelle_en' => 'Server'
                ],
                295 => [
                    'libelle' => 'Identifiant',
                    'libelle_en' => 'Login'
                ],
                296 => [
                    'libelle' => 'Lien',
                    'libelle_en' => 'Link'
                ],
                297 => [
                    'libelle' => 'Site Web',
                    'libelle_en' => 'Website'
                ],
                298 => [
                    'libelle' => "Page d'accueil",
                    'libelle_en' => 'Homepage'
                ],
                299 => [
                    'libelle' => 'Internet',
                    'libelle_en' => 'The Internet'
                ],
                300 => [
                    'libelle' => 'Quitter',
                    'libelle_en' => 'Exit'
                ],
                301 => [
                    'libelle' => 'Télécharger',
                    'libelle_en' => 'Download'
                ],
                302 => [
                    'libelle' => 'Etre en ligne',
                    'libelle_en' => 'To be online'
                ],
                303 => [
                    'libelle' => 'Etre hors ligne',
                    'libelle_en' => 'To be Offline'
                ],
                304 => [
                    'libelle' => 'Boîte mail',
                    'libelle_en' => 'Mail Box'
                ],
                305 => [
                    'libelle' => 'Boite de réception',
                    'libelle_en' => 'Inbox'
                ],
                306 => [
                    'libelle' => 'Compte e-mail',
                    'libelle_en' => 'E-mail account'
                ],
                307 => [
                    'libelle' => 'Adresse Electronique',
                    'libelle_en' => 'E-mail address'
                ],
                308 => [
                    'libelle' => '@ (arobase)',
                    'libelle_en' => 'at'
                ],
                309 => [
                    'libelle' => 'point com (.com)',
                    'libelle_en' => 'Dot com'
                ],
                310 => [
                    'libelle' => '_',
                    'libelle_en' => 'Underscore'
                ],
                311 => [
                    'libelle' => '/',
                    'libelle_en' => 'slash'
                ],



                //Animaux
                321 => [
                    'libelle' => 'Chien',
                    'libelle_en' => 'Dog'
                ],
                322 => [
                    'libelle' => 'Chiot',
                    'libelle_en' => 'Puppy'
                ],
                323 => [
                    'libelle' => 'Chat',
                    'libelle_en' => 'Cat'
                ],
                324 => [
                    'libelle' => 'Chaton',
                    'libelle_en' => 'Kitten'
                ],
                325 => [
                    'libelle' => 'Souris',
                    'libelle_en' => 'Mouse'
                ],
                326 => [
                    'libelle' => 'Hamster',
                    'libelle_en' => 'Hamster'
                ],
                327 => [
                    'libelle' => 'Lapin',
                    'libelle_en' => 'Rabbit'
                ],
                328 => [
                    'libelle' => 'Poisson Rouge',
                    'libelle_en' => 'Gold Fish'
                ],
                329 => [
                    'libelle' => 'Oiseau',
                    'libelle_en' => 'Bird'
                ],
                330 => [
                    'libelle' => 'Cochon',
                    'libelle_en' => 'Pig'
                ],
                331 => [
                    'libelle' => 'Vache',
                    'libelle_en' => 'Cow'
                ],
                332 => [
                    'libelle' => 'Cheval',
                    'libelle_en' => 'Horse'
                ],
                333 => [
                    'libelle' => 'Canard',
                    'libelle_en' => 'Duck'
                ],
                334 => [
                    'libelle' => 'Coq',
                    'libelle_en' => 'Rooster'
                ],
                335 => [
                    'libelle' => 'Poule',
                    'libelle_en' => 'Chicken'
                ],
                336 => [
                    'libelle' => 'Chèvre',
                    'libelle_en' => 'Goat'
                ],
                337 => [
                    'libelle' => 'Mouton',
                    'libelle_en' => 'Sheep'
                ],
                338 => [
                    'libelle' => 'Lion',
                    'libelle_en' => 'Lion'
                ],
                339 => [
                    'libelle' => 'Tigre',
                    'libelle_en' => 'Tiger'
                ],
                340 => [
                    'libelle' => 'Girafe',
                    'libelle_en' => 'Giraffe'
                ],
                341 => [
                    'libelle' => 'Eléphant',
                    'libelle_en' => 'Elephant'
                ],
                342 => [
                    'libelle' => 'Crocodile',
                    'libelle_en' => 'Crocodile'
                ],
                343 => [
                    'libelle' => 'Singe',
                    'libelle_en' => 'Monkey'
                ],
                344 => [
                    'libelle' => 'Zèbre',
                    'libelle_en' => 'Zeebra'
                ],
                345 => [
                    'libelle' => 'Requin',
                    'libelle_en' => 'Shark'
                ],
                346 => [
                    'libelle' => 'Dauphin',
                    'libelle_en' => 'Dolphin'
                ],
                347 => [
                    'libelle' => 'Baleine',
                    'libelle_en' => 'Whale'
                ],
                348 => [
                    'libelle' => 'Poisson',
                    'libelle_en' => 'Fish'
                ],
                349 => [
                    'libelle' => 'Tortue',
                    'libelle_en' => 'Tortoise'
                ],
                350 => [
                    'libelle' => 'Thon',
                    'libelle_en' => 'Tuna'
                ],
                351 => [
                    'libelle' => 'Crevette',
                    'libelle_en' => 'Shrimp'
                ],
                352 => [
                    'libelle' => 'Pieuvre',
                    'libelle_en' => 'Octopus'
                ],
                353 => [
                    'libelle' => 'Araignée',
                    'libelle_en' => 'Spider'
                ],
                354 => [
                    'libelle' => 'Escargot',
                    'libelle_en' => 'Snail'
                ],
                355 => [
                    'libelle' => 'Coccinelle',
                    'libelle_en' => 'Labybug'
                ],
                356 => [
                    'libelle' => 'Moustique',
                    'libelle_en' => 'Mosquito'
                ],
                357 => [
                    'libelle' => 'Ver',
                    'libelle_en' => 'Worm'
                ],
                358 => [
                    'libelle' => 'Mouche',
                    'libelle_en' => 'Fly'
                ],
                359 => [
                    'libelle' => 'Fourmi',
                    'libelle_en' => 'Ant'
                ],
                360 => [
                    'libelle' => 'Abeille',
                    'libelle_en' => 'Bee'
                ],
                361 => [
                    'libelle' => 'Papillon',
                    'libelle_en' => 'Butterfly'
                ],
                362 => [
                    'libelle' => 'Chenille',
                    'libelle_en' => 'Caterpillar'
                ],
                363 => [
                    'libelle' => 'Libellule',
                    'libelle_en' => 'Dragonfly'
                ],
                








            ];
        $categ = new Categorie();
        $categ->setLibelle('Nom Commun');
        $manager->persist($categ);

        foreach ($vocabulaires as $key => $value) {

            $vocabulaire = new Vocabulaire();

            $vocabulaire->setCategorie($categ);
            $vocabulaire->setLibelle($value['libelle']);
            $vocabulaire->setLibelleEn($value['libelle_en']);
            $manager->persist($vocabulaire);
        }

        $manager->flush();
    }
}
