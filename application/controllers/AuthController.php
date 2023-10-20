<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->model('CrudModel', "crud");
		// $this->class->yourfnc();



	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *        
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	public function index()
	{
		// $result['data'] = $this->db->select('*')
		// 	->from('payment_transaction')
		// 	->get()->result_array();
		$result["route"] = $this->uri->segment(1);
		$result["data"] = $this->crud->display_record();

		// if ($result["route"] == "daily-collection") {
		$result["data"] = [
			[
				"id" => 1,
				"ar_number" => "6961838278",
				"date_time" => "2022-02-18",
				"agency_name" => "Lazz",
				"name_of_payor" => "Odell Mc Harg",
				"particulars" => "comic",
				"amount" => 705.25,
				"service_charge" => 421.28,
				"tax" => 721.91,
				"total_amount" => 693.63,
				"reference_number" => 5448315862
			],
			[
				"id" => 2,
				"ar_number" => "3029170764",
				"date_time" => "2023-09-24",
				"agency_name" => "Skinix",
				"name_of_payor" => "Roanna Bardill",
				"particulars" => "coin",
				"amount" => 628.52,
				"service_charge" => 141.48,
				"tax" => 973.72,
				"total_amount" => 618.54,
				"reference_number" => 2454319343
			],
			[
				"id" => 3,
				"ar_number" => "8620241958",
				"date_time" => "2023-04-11",
				"agency_name" => "Yacero",
				"name_of_payor" => "Phoebe Ripon",
				"particulars" => "book",
				"amount" => 304.41,
				"service_charge" => 529.52,
				"tax" => 134.18,
				"total_amount" => 424.55,
				"reference_number" => 9418285730
			],
			[
				"id" => 4,
				"ar_number" => "0490378692",
				"date_time" => "2022-05-26",
				"agency_name" => "Oyoloo",
				"name_of_payor" => "Corinna Josselson",
				"particulars" => "book",
				"amount" => 311.21,
				"service_charge" => 624.08,
				"tax" => 282.94,
				"total_amount" => 938.19,
				"reference_number" => 6798634374
			],
			[
				"id" => 5,
				"ar_number" => "8466725733",
				"date_time" => "2023-02-16",
				"agency_name" => "Devpulse",
				"name_of_payor" => "Cecilius Aseef",
				"particulars" => "jewelry",
				"amount" => 506.53,
				"service_charge" => 547.56,
				"tax" => 662.62,
				"total_amount" => 319.39,
				"reference_number" => 8941484417
			],
			[
				"id" => 6,
				"ar_number" => "8087735188",
				"date_time" => "2022-04-25",
				"agency_name" => "Twitterlist",
				"name_of_payor" => "Tadio Harriagn",
				"particulars" => "jewelry",
				"amount" => 105.59,
				"service_charge" => 773.84,
				"tax" => 792.83,
				"total_amount" => 890.42,
				"reference_number" => 5858396267
			],
			[
				"id" => 7,
				"ar_number" => "8004015603",
				"date_time" => "2022-06-26",
				"agency_name" => "Jabbertype",
				"name_of_payor" => "Toby Caldroni",
				"particulars" => "jewelry",
				"amount" => 474.82,
				"service_charge" => 337.02,
				"tax" => 976.29,
				"total_amount" => 659.92,
				"reference_number" => 2197030862
			],
			[
				"id" => 8,
				"ar_number" => "0766036278",
				"date_time" => "2022-09-30",
				"agency_name" => "Pixope",
				"name_of_payor" => "Vasili Rochewell",
				"particulars" => "wine",
				"amount" => 439.6,
				"service_charge" => 538.48,
				"tax" => 211.89,
				"total_amount" => 983.19,
				"reference_number" => 3083766334
			],
			[
				"id" => 9,
				"ar_number" => "5859863187",
				"date_time" => "2022-05-29",
				"agency_name" => "Jabbersphere",
				"name_of_payor" => "Ashley Tidey",
				"particulars" => "toy",
				"amount" => 905.22,
				"service_charge" => 915.19,
				"tax" => 643.63,
				"total_amount" => 646.76,
				"reference_number" => 3246853612
			],
			[
				"id" => 10,
				"ar_number" => "4463212391",
				"date_time" => "2022-09-19",
				"agency_name" => "Meembee",
				"name_of_payor" => "Moina Tourner",
				"particulars" => "coin",
				"amount" => 276.34,
				"service_charge" => 804.44,
				"tax" => 311.02,
				"total_amount" => 357,
				"reference_number" => 5821679528
			],
			[
				"id" => 11,
				"ar_number" => "8329266575",
				"date_time" => "2023-04-20",
				"agency_name" => "Yamia",
				"name_of_payor" => "Jillayne Betancourt",
				"particulars" => "painting",
				"amount" => 590.29,
				"service_charge" => 369.07,
				"tax" => 321.39,
				"total_amount" => 337.64,
				"reference_number" => 6192634648
			],
			[
				"id" => 12,
				"ar_number" => "4233150149",
				"date_time" => "2023-07-28",
				"agency_name" => "Jetwire",
				"name_of_payor" => "Drake Base",
				"particulars" => "comic",
				"amount" => 700.86,
				"service_charge" => 125.6,
				"tax" => 557.39,
				"total_amount" => 272.58,
				"reference_number" => 6799015529
			],
			[
				"id" => 13,
				"ar_number" => "6249311912",
				"date_time" => "2023-07-21",
				"agency_name" => "Wordware",
				"name_of_payor" => "Ferdy Calabry",
				"particulars" => "coin",
				"amount" => 260.58,
				"service_charge" => 685.51,
				"tax" => 988.73,
				"total_amount" => 249.27,
				"reference_number" => 8252667098
			],
			[
				"id" => 14,
				"ar_number" => "2658709404",
				"date_time" => "2022-08-04",
				"agency_name" => "Youspan",
				"name_of_payor" => "Melanie Alfonso",
				"particulars" => "coin",
				"amount" => 671.46,
				"service_charge" => 245.32,
				"tax" => 455.49,
				"total_amount" => 239.49,
				"reference_number" => 1548214115
			],
			[
				"id" => 15,
				"ar_number" => "1497422612",
				"date_time" => "2022-02-18",
				"agency_name" => "Divavu",
				"name_of_payor" => "Rudie Stoddart",
				"particulars" => "antique",
				"amount" => 624.27,
				"service_charge" => 615.09,
				"tax" => 773.76,
				"total_amount" => 330.76,
				"reference_number" => 5239227359
			],
			[
				"id" => 16,
				"ar_number" => "0710038992",
				"date_time" => "2022-02-18",
				"agency_name" => "Kamba",
				"name_of_payor" => "Otho Petrovsky",
				"particulars" => "antique",
				"amount" => 480.55,
				"service_charge" => 435.52,
				"tax" => 722.99,
				"total_amount" => 458.1,
				"reference_number" => 4924985574
			],
			[
				"id" => 17,
				"ar_number" => "1412956102",
				"date_time" => "2023-11-19",
				"agency_name" => "Dynava",
				"name_of_payor" => "Carlee Endrighi",
				"particulars" => "antique",
				"amount" => 415.41,
				"service_charge" => 393.57,
				"tax" => 691.39,
				"total_amount" => 518.74,
				"reference_number" => 4935480016
			],
			[
				"id" => 18,
				"ar_number" => "5181210732",
				"date_time" => "2022-02-18",
				"agency_name" => "Gabtype",
				"name_of_payor" => "Addi Masters",
				"particulars" => "painting",
				"amount" => 869.65,
				"service_charge" => 115.89,
				"tax" => 56.72,
				"total_amount" => 400.2,
				"reference_number" => 8197448502
			],
			[
				"id" => 19,
				"ar_number" => "6138852109",
				"date_time" => "2022-12-25",
				"agency_name" => "Skimia",
				"name_of_payor" => "Dare Joan",
				"particulars" => "stamps",
				"amount" => 913.01,
				"service_charge" => 569.47,
				"tax" => 259.39,
				"total_amount" => 509.4,
				"reference_number" => 5325484310
			],
			[
				"id" => 20,
				"ar_number" => "8656409700",
				"date_time" => "2022-02-18",
				"agency_name" => "Leenti",
				"name_of_payor" => "Jasmina Gadault",
				"particulars" => "antique",
				"amount" => 145.8,
				"service_charge" => 997.9,
				"tax" => 785.9,
				"total_amount" => 573.23,
				"reference_number" => 2263508357
			],
			[
				"id" => 21,
				"ar_number" => "4044975361",
				"date_time" => "2022-05-18",
				"agency_name" => "Voolia",
				"name_of_payor" => "Gwennie Bibby",
				"particulars" => "wine",
				"amount" => 757.38,
				"service_charge" => 648.72,
				"tax" => 409.88,
				"total_amount" => 135.4,
				"reference_number" => 9437487644
			],
			[
				"id" => 22,
				"ar_number" => "7713275916",
				"date_time" => "2022-03-21",
				"agency_name" => "Feedbug",
				"name_of_payor" => "Padgett Hurdis",
				"particulars" => "painting",
				"amount" => 170.2,
				"service_charge" => 305.93,
				"tax" => 853.31,
				"total_amount" => 356.86,
				"reference_number" => 5166774006
			],
			[
				"id" => 23,
				"ar_number" => "3909684483",
				"date_time" => "2023-01-06",
				"agency_name" => "Muxo",
				"name_of_payor" => "Kaylee German",
				"particulars" => "wine",
				"amount" => 572.97,
				"service_charge" => 854.93,
				"tax" => 975.9,
				"total_amount" => 277.76,
				"reference_number" => 1079517713
			],
			[
				"id" => 24,
				"ar_number" => "3710671051",
				"date_time" => "2023-10-12",
				"agency_name" => "Mycat",
				"name_of_payor" => "Gene Zumbusch",
				"particulars" => "coin",
				"amount" => 543.99,
				"service_charge" => 684.17,
				"tax" => 212.84,
				"total_amount" => 578.55,
				"reference_number" => 9775381597
			],
			[
				"id" => 25,
				"ar_number" => "9249740301",
				"date_time" => "2023-02-24",
				"agency_name" => "Miboo",
				"name_of_payor" => "Arleta Treadgear",
				"particulars" => "painting",
				"amount" => 850.97,
				"service_charge" => 295.46,
				"tax" => 804.2,
				"total_amount" => 146.58,
				"reference_number" => 4959319146
			]
		];

		// }

		$this->load->view('index', $result);
	}


	public function validate_route($route)
	{
		if (isset($route)) {
			$this->load->view('./modules/admin_dashboard');
			return;
		}
		if ($route == "crud") {
			$this->load->view('./modules/admin_dashboard');
		}
	}

	public function test()
	{
		$this->load->view('hello');
	}


	public function redirect()
	{

		// ## With Model ####
		// $result['data']=$this->CrudModel->display_record();

		// ## Without Model ####
		$route = $this->uri->segment(1);
		$result['data'] = $this->db->select('*')
			->from('payment_transaction')
			->get()->result_array();
		$result['route'] = $route;
		$this->load->view('index', $result);
	}

	public function test_api()
	{

		$query = $this->db->query("SELECT * FROM payment_transaction");
		echo json_encode($query->result_array());

	}
}