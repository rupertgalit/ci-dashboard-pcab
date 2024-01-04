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
				"ar_number" => 9402750501,
				"date_time" => "2022-02-18",
				"agency_name" => "Fiveclub",
				"name_of_payor" => "Cindi Empson",
				"particulars" => "gizmo",
				"amount" => 159.89,
				"service_charge" => 25.0,
				"tax" => 19.1868,
				"total_amount" => 204.0768,
				"reference_number" => 5199481808
			],
			[
				"id" => 2,
				"ar_number" => 6857732772,
				"date_time" => "2023-07-17",
				"agency_name" => "Tanoodle",
				"name_of_payor" => "Matty Filinkov",
				"particulars" => "doohickey",
				"amount" => 432.11,
				"service_charge" => 25.0,
				"tax" => 51.8532,
				"total_amount" => 508.9632,
				"reference_number" => 561467887
			],
			[
				"id" => 3,
				"ar_number" => 8311553158,
				"date_time" => "2022-10-10",
				"agency_name" => "Twitterlist",
				"name_of_payor" => "Dody Gittens",
				"particulars" => "thingamajig",
				"amount" => 255.32,
				"service_charge" => 25.0,
				"tax" => 30.6384,
				"total_amount" => 310.9584,
				"reference_number" => 3165727792
			],
			[
				"id" => 4,
				"ar_number" => 2067995298,
				"date_time" => "2022-06-15",
				"agency_name" => "Centimia",
				"name_of_payor" => "Isabel Inns",
				"particulars" => "contraption",
				"amount" => 569.7,
				"service_charge" => 25.0,
				"tax" => 68.364,
				"total_amount" => 663.064,
				"reference_number" => 9494522692
			],
			[
				"id" => 5,
				"ar_number" => 9940181377,
				"date_time" => "2023-01-14",
				"agency_name" => "Feedfish",
				"name_of_payor" => "Evvy Hamil",
				"particulars" => "doohickey",
				"amount" => 356.83,
				"service_charge" => 25.0,
				"tax" => 42.8196,
				"total_amount" => 424.6496,
				"reference_number" => 7294670435
			],
			[
				"id" => 6,
				"ar_number" => 100952240,
				"date_time" => "2022-10-15",
				"agency_name" => "Yotz",
				"name_of_payor" => "Gwendolen Woodfin",
				"particulars" => "apparatus",
				"amount" => 355.62,
				"service_charge" => 25.0,
				"tax" => 42.6744,
				"total_amount" => 423.2944,
				"reference_number" => 7303234931
			],
			[
				"id" => 7,
				"ar_number" => 5944500174,
				"date_time" => "2021-12-05",
				"agency_name" => "Abata",
				"name_of_payor" => "Willi Pudge",
				"particulars" => "widgetizer",
				"amount" => 26.17,
				"service_charge" => 25.0,
				"tax" => 3.1404,
				"total_amount" => 54.3104,
				"reference_number" => 3207609806
			],
			[
				"id" => 8,
				"ar_number" => 8066841431,
				"date_time" => "2022-09-18",
				"agency_name" => "Gabspot",
				"name_of_payor" => "Ibrahim Banaszewski",
				"particulars" => "doohickey",
				"amount" => 242.09,
				"service_charge" => 25.0,
				"tax" => 29.0508,
				"total_amount" => 296.1408,
				"reference_number" => 7140900123
			],
			[
				"id" => 9,
				"ar_number" => 5087237689,
				"date_time" => "2023-09-06",
				"agency_name" => "Dynazzy",
				"name_of_payor" => "Amelia Rehn",
				"particulars" => "apparatus",
				"amount" => 289.79,
				"service_charge" => 25.0,
				"tax" => 34.7748,
				"total_amount" => 349.5648,
				"reference_number" => 1412711374
			],
			[
				"id" => 10,
				"ar_number" => 10907417,
				"date_time" => "2022-10-30",
				"agency_name" => "Brainverse",
				"name_of_payor" => "Jarad Cripwell",
				"particulars" => "doodad",
				"amount" => 543.89,
				"service_charge" => 25.0,
				"tax" => 65.2668,
				"total_amount" => 634.1568,
				"reference_number" => 8516946744
			],
			[
				"id" => 11,
				"ar_number" => 611259867,
				"date_time" => "2022-06-20",
				"agency_name" => "Twiyo",
				"name_of_payor" => "Frazier Studart",
				"particulars" => "doohickey",
				"amount" => 406.66,
				"service_charge" => 25.0,
				"tax" => 48.7992,
				"total_amount" => 480.4592,
				"reference_number" => 5919792205
			],
			[
				"id" => 12,
				"ar_number" => 4004643005,
				"date_time" => "2023-03-05",
				"agency_name" => "Bubbletube",
				"name_of_payor" => "Antonius Milesap",
				"particulars" => "gadget",
				"amount" => 339.05,
				"service_charge" => 25.0,
				"tax" => 40.686,
				"total_amount" => 404.736,
				"reference_number" => 4003737916
			],
			[
				"id" => 13,
				"ar_number" => 7467620448,
				"date_time" => "2022-02-18",
				"agency_name" => "Riffpedia",
				"name_of_payor" => "Pru Biggen",
				"particulars" => "gadget",
				"amount" => 120.33,
				"service_charge" => 25.0,
				"tax" => 14.4396,
				"total_amount" => 159.7696,
				"reference_number" => 6910385888
			],
			[
				"id" => 14,
				"ar_number" => 4830942129,
				"date_time" => "2022-12-24",
				"agency_name" => "Kaymbo",
				"name_of_payor" => "Fernande Phebee",
				"particulars" => "thingamajig",
				"amount" => 934.55,
				"service_charge" => 25.0,
				"tax" => 112.146,
				"total_amount" => 1071.696,
				"reference_number" => 3840086598
			],
			[
				"id" => 15,
				"ar_number" => 9431864384,
				"date_time" => "2022-08-15",
				"agency_name" => "Rooxo",
				"name_of_payor" => "Kathryne Corrigan",
				"particulars" => "doodad",
				"amount" => 249.56,
				"service_charge" => 25.0,
				"tax" => 29.9472,
				"total_amount" => 304.5072,
				"reference_number" => 8628019870
			],
			[
				"id" => 16,
				"ar_number" => 904339811,
				"date_time" => "2023-03-12",
				"agency_name" => "Devify",
				"name_of_payor" => "Melisenda Longley",
				"particulars" => "whatchamacallit",
				"amount" => 828.7,
				"service_charge" => 25.0,
				"tax" => 99.444,
				"total_amount" => 953.144,
				"reference_number" => 3771865249
			],
			[
				"id" => 17,
				"ar_number" => 1061371289,
				"date_time" => "2023-09-12",
				"agency_name" => "Eare",
				"name_of_payor" => "Joanna Derrick",
				"particulars" => "thingamajig",
				"amount" => 651.63,
				"service_charge" => 25.0,
				"tax" => 78.1956,
				"total_amount" => 754.8256,
				"reference_number" => 5776108907
			],
			[
				"id" => 18,
				"ar_number" => 4174925511,
				"date_time" => "2022-02-18",
				"agency_name" => "Voolia",
				"name_of_payor" => "Nealy Glason",
				"particulars" => "widgetizer",
				"amount" => 670.9,
				"service_charge" => 25.0,
				"tax" => 80.508,
				"total_amount" => 776.408,
				"reference_number" => 6682947779
			],
			[
				"id" => 19,
				"ar_number" => 7769491506,
				"date_time" => "2022-02-18",
				"agency_name" => "Skiba",
				"name_of_payor" => "Holly-anne Cainey",
				"particulars" => "thingamajig",
				"amount" => 994.7,
				"service_charge" => 25.0,
				"tax" => 119.364,
				"total_amount" => 1139.064,
				"reference_number" => 6271052096
			],
			[
				"id" => 20,
				"ar_number" => 6448367679,
				"date_time" => "2022-04-17",
				"agency_name" => "Meedoo",
				"name_of_payor" => "Cordula MacAlinden",
				"particulars" => "widgetizer",
				"amount" => 749.93,
				"service_charge" => 25.0,
				"tax" => 89.9916,
				"total_amount" => 864.9216,
				"reference_number" => 1313415019
			],
			[
				"id" => 21,
				"ar_number" => 1433245685,
				"date_time" => "2022-03-04",
				"agency_name" => "Voonder",
				"name_of_payor" => "Gertie Doerling",
				"particulars" => "thingamajig",
				"amount" => 174.44,
				"service_charge" => 25.0,
				"tax" => 20.9328,
				"total_amount" => 220.3728,
				"reference_number" => 5178319532
			],
			[
				"id" => 22,
				"ar_number" => 864250624,
				"date_time" => "2023-03-21",
				"agency_name" => "Skimia",
				"name_of_payor" => "Ailbert Neilan",
				"particulars" => "whatchamacallit",
				"amount" => 531.87,
				"service_charge" => 25.0,
				"tax" => 63.8244,
				"total_amount" => 620.6944,
				"reference_number" => 138671924
			],
			[
				"id" => 23,
				"ar_number" => 543028441,
				"date_time" => "2023-08-23",
				"agency_name" => "Photobean",
				"name_of_payor" => "Cilka Dawidowitz",
				"particulars" => "gizmo",
				"amount" => 44.63,
				"service_charge" => 25.0,
				"tax" => 5.3556,
				"total_amount" => 74.9856,
				"reference_number" => 2655486827
			],
			[
				"id" => 24,
				"ar_number" => 1690384251,
				"date_time" => "2023-01-18",
				"agency_name" => "Wikivu",
				"name_of_payor" => "Shalom Langan",
				"particulars" => "apparatus",
				"amount" => 576.81,
				"service_charge" => 25.0,
				"tax" => 69.2172,
				"total_amount" => 671.0272,
				"reference_number" => 8598457135
			],
			[
				"id" => 25,
				"ar_number" => 2009109378,
				"date_time" => "2023-04-22",
				"agency_name" => "Twitterworks",
				"name_of_payor" => "Jeramey Tichner",
				"particulars" => "doodad",
				"amount" => 490.33,
				"service_charge" => 25.0,
				"tax" => 58.8396,
				"total_amount" => 574.1696,
				"reference_number" => 8946245667
			]
		];

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