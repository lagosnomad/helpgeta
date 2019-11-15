<?php

namespace Modules\Categories\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class CategoriesDatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('categories')->truncate();

        $categories = [
            [
                'category' => 'Nanny Services',
                'slug'     => 'nanny-services',
                'icon'     => 'nanny.png',
                'body'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! ipsum dolor sit Rem autem voluptatem obcaecatiss,orem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaeca',
                'parent_id' => 0,
                'is_hourly_based'=> 1
            ],
            [
                'category' => 'Housekeeping',
                'slug'     => 'housekeeping',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Chef/Cook Services',
                'slug'     => 'chef-cooking-services',
                'icon'     => 'chef.png',
                'body'      => '',
                'parent_id' => 0,
                 'is_hourly_based'=> 0
            ],
            [
                'category' => 'Driving',
                'slug'     => 'driving',
                'icon'     => 'driving.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based' => 1
            ],
            [
                'category' => 'Tutoring',
                'slug'     => 'tutoring',
                'icon'     => 'tutoring.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],

            [
                'category' => 'Beautician',
                'slug'     => 'beautician',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
             [
               'category' => 'Hairdressing',
               'slug'     => 'hairdressing',
               'icon'     => 'hairdressing.png',
               'body'      => '',
               'parent_id' => 6,
               'is_hourly_based'=> 0
           ],
           [
               'category' => 'Manicure & Pedicure',
               'slug'     => 'manicure-pedicure',
               'icon'     => 'manicure.png',
               'body'      => '',
               'parent_id' => 6,
               'is_hourly_based'=> 0
           ],
            [
                'category' => 'Barbing',
                'slug'     => 'barbing',
                'icon'     => 'barbing.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Carpentry',
                'slug'     => 'carpentry',
                'icon'     => 'carpentry.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Electrical Services',
                'slug'     => 'electrical-services',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Engineer',
                'slug'     => 'engineer',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Mobile Phone Technician',
                'slug'     => 'mobile-phone-technician',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 12,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Computer Technician',
                'slug'     => 'computer-technician',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 12,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Big Gen Servicing',
                'slug'     => 'big-gen-servicing',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 12,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Small Gen Servicing',
                'slug'     => 'small-gen-servicing',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 12,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'AC Installer',
                'slug'     => 'ac-installer',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 12,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Satellite TV Installer',
                'slug'     => 'satellite-tv-installer',
                'icon'     => 'electrical.png',
                'body'      => '',
                'parent_id' => 12,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Plumbing',
                'slug'     => 'plumbing',
                'icon'     => 'plumbing.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Painting',
                'slug'     => 'painting',
                'icon'     => 'painting.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Moving',
                'slug'     => 'moving',
                'icon'     => 'moving.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Photography',
                'slug'     => 'photography',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Wedding Photography',
                'slug'     => 'wedding-photography',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 16,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Birthday Photography',
                'slug'     => 'birthday-photography',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 16,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Virtual Services',
                'slug'     => 'virtual-services',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Veterinary Doctor',
                'slug'     => 'veterinary-doctor ',
                'icon'     => 'moving.png',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Tailoring',
                'slug'     => 'tailoring',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 0,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Fittings',
                'slug'     => 'fittings',
                'icon'     => '',
                'body'      => '(zip fastening, button fixing, cloth resizing , patching and restyling',
                'parent_id' => 27,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Fittings',
                'slug'     => 'fittings',
                'icon'     => '',
                'body'      => 'zip fastening, button fixing, cloth resizing , patching and restyling',
                'parent_id' => 27,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Men',
                'slug'     => 'men',
                'icon'     => '',
                'body'      => 'cap sewing ,native plain style , native custom design, shirt sewing , trousers sewing, suit',
                'parent_id' => 27,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Women',
                'slug'     => 'women',
                'icon'     => '',
                'body'      => 'headtie cutting, blouse sewing (lace), gown sewing (lace), skirt (lace), blouse(Ankara/casual material ),
gown (Ankara/casual material), skirt(Ankara/casual material)',
                'parent_id' => 27,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Mathematics',
                'slug'     => 'mathematics',
                'icon'     => 'tutoring.png',
                'body'      => '',
                'parent_id' => 5,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'English Language',
                'slug'     => 'english-language',
                'icon'     => 'tutoring.png',
                'body'      => '',
                'parent_id' => 5,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Cornrows',
                'slug'     => 'cornrows',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Tiny braids',
                'slug'     => 'tiny-braids',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'One Million Braids',
                'slug'     => 'one-million-braids',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Medium Braids',
                'slug'     => 'medium-braids',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Crochet',
                'slug'     => 'crochet',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Braided Wig',
                'slug'     => 'braided-wig',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Dreadlock Natural',
                'slug'     => 'dreadlock-natural',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Dreadlock',
                'slug'     => 'dreadlock',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Dread Unlocking',
                'slug'     => 'dreadlock-unlocking',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Ghana Weaving',
                'slug'     => 'ghana-weaving',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Natural Weaving',
                'slug'     => 'natural-weaving',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Hair Dying',
                'slug'     => 'hair-dying',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Weave Fixing',
                'slug'     => 'weave-fixing',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Hair Relaxing and Styling',
                'slug'     => 'hair-relaxing-and-styling',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Conditioning',
                'slug'     => 'conditioning',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Treatment and Styling',
                'slug'     => 'treatment-and-styling',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Styling and Packing with Gel',
                'slug'     => 'styling-and-packing-with-gel',
                'icon'     => 'hairdressing.png',
                'body'      => '',
                'parent_id' => 7,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Pedicure',
                'slug'     => 'pedicure',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 8,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Manicure',
                'slug'     => 'manicure',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 8,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'combo(pedicure & manicure)',
                'slug'     => 'combo',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 8,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Artificial Nails',
                'slug'     => 'artificial-nails',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 8,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Nail Polishing',
                'slug'     => 'nail-polishing',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 8,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Make Up',
                'slug'     => 'make-up',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 6,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Everyday Make-up',
                'slug'     => 'everyday-make-up',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 56,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Bridal Make-up',
                'slug'     => 'bridal-make-up',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 56,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Bridal Make-up',
                'slug'     => 'bridal-make-up',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 56,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Occasion Make-up',
                'slug'     => 'occasion-make-up',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 56,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Head Gear Tie',
                'slug'     => 'head-gear-tie',
                'icon'     => 'manicure.png',
                'body'      => '',
                'parent_id' => 56,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Cleaning',
                'slug'     => 'cleaning',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 2,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Self-Contain',
                'slug'     => 'self-contain',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 62,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Flat',
                'slug'     => 'flat',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 62,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Duplex',
                'slug'     => 'duplex',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 62,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Laundry',
                'slug'     => 'laundry',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 2,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Charge based on clothing',
                'slug'     => 'charge-based-on-clothing',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 66,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Towel',
                'slug'     => 'towel',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 66,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Bed Sheet',
                'slug'     => 'bed-sheet',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 66,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Jeans',
                'slug'     => 'jeans',
                'icon'     => 'housekeeping.png',
                'body'      => '',
                'parent_id' => 66,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Zip Fastening',
                'slug'     => 'zip-fastening',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 28,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Button Fixing',
                'slug'     => 'button-fixing',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 28,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Cloth Resizing',
                'slug'     => 'cloth-resizing',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 28,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Patching and Restyling',
                'slug'     => 'patching and restyling',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 28,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Cap Sewing',
                'slug'     => 'cap sewing',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Native Plain Style',
                'slug'     => 'native-plain-style',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Native Custom Design,',
                'slug'     => 'native-custom-design',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Native Custom Design,',
                'slug'     => 'native-custom-design',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Native Custom Design,',
                'slug'     => 'native-custom-design',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Shirt Sewing',
                'slug'     => 'shirt-sewing',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Trousers Sewing',
                'slug'     => 'trousers-sewing',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Suit',
                'slug'     => 'suit',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 30,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Headtie Cutting',
                'slug'     => 'headtie-cutting,',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Blouse Sewing (lace)',
                'slug'     => 'blouse-sewing-lace',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Gown Sewing (lace)',
                'slug'     => 'gown-sewing-lace',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Gown Sewing (lace)',
                'slug'     => 'gown-sewing-lace',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Skirt (lace)',
                'slug'     => 'skirt-lace',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Blouse(Ankara/casual material )',
                'slug'     => 'blouse-Ankara-casual-material',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Gown(Ankara/casual material )',
                'slug'     => 'gown-Ankara-casual-material',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],
            [
                'category' => 'Skirt(Ankara/casual material )',
                'slug'     => 'skirt-Ankara-casual-material',
                'icon'     => '',
                'body'      => '',
                'parent_id' => 31,
                'is_hourly_based'=> 0
            ],

        ];

        DB::table('categories')->insert($categories);

    }
}
